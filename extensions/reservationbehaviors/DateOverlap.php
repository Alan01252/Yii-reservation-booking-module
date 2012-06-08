<?php
/**
 * Add overlap behaviour to our reservations. 
 * Prevents bookings being booked when there are no rooms available.
 * 
 * @author alan.hollis http://alanhollis.com
 * @copyright alan.hollis http://alanhollis.com
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * 
 * Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:
 * Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
 * Neither the name of Yii Software LLC nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

class DateOverlap extends CActiveRecordBehavior
{
	private $_connection;
	
	/**
	 * Fire before saving our reservation, make sure we have the rooms available.
	 * @param Reservation $event
	 */
    public function beforeSave($event)
    {
    	$reservation = $event->sender;
    	
    	if(!$this->isReservationAvailable($reservation)) {
    		$event->isValid = false;
    		$reservation->addError('datefrom', 'The room selected is not available in for these dates');
    		return false;
    	}
    	return true;
    }
    /**
     * @param model $reservation
     * @return boolean True if availble/ false if not
     */
    public function isReservationAvailable($reservation)
    {
    	$this->_connection=Yii::app()->db;
    	/**
    	 * Find the type of room we're trying to reserve.
    	 */
    	$roomType = RoomType::model()->findByPk($reservation->getAttribute('roomid'));
		if($roomType===null)
			return false;
			
    	$this->dropTemporaryTable();
    	$this->createTemporaryTable();
    	$this->populateTemporaryTable($reservation->getAttribute('datefrom'), $reservation->getAttribute('dateto'));
    	$this->updateRoomCounts($reservation);
    	
    	$roomCount = $this->findMaxRoomCount();
    	$reservation->setAttribute('roomsavailable',$roomType->getAttribute('quantity') -$this->findMaxRoomCount());
    	
    	if($roomCount >= $roomType->getAttribute('quantity')) {
    		return false;
    	}	
        return true;
    }
    
    /**
     * Used as part of creating the resevation temporary table.
     * @return int The maximum amount of rooms booked on that date.
     */
    private function findMaxRoomCount()
    {
    	$sql = "SELECT MAX(`roomcount`)as maxroomcount FROM tempreservationtable";
    	$command=$this->_connection->createCommand($sql);
		return $command->queryScalar();
    }
    
    /**
     * Drop the temporary table
     */
    private function dropTemporaryTable()
    {
   		$sql = "DROP TABLE IF EXISTS `tempreservationtable`;";
		$command=$this->_connection->createCommand($sql);
		$command->execute();
    }
    /**
     * Create the temporary table
     */
    private function createTemporaryTable()
    {
    	$sql = "CREATE TEMPORARY TABLE `tempreservationtable` (`reserveddate` DATE NOT NULL ,`roomcount` SMALLINT NOT NULL)";
    	$command=$this->_connection->createCommand($sql);
		$command->execute();
    }
    
    /**
     * 
     * Populates a row for every date between our date from and date to.
     * We use this table to check how many rooms are allocated in anyone day.
     * @param date $dateFrom
     * @param date $dateTo
     */
    private function populateTemporaryTable($dateFrom,$dateTo)
    {
    	$searchDate = $dateFrom;
    	
    	$sql = "INSERT INTO tempreservationtable VALUES (:searchdate, '0')";
    	$command=$this->_connection->createCommand($sql);
    	$command->bindParam(":searchdate",$searchDate,PDO::PARAM_STR);
    	$command->execute();
    	
		while(strtotime($searchDate) < strtotime($dateTo)) {
			$searchDate = strtotime ( '+1 day' , strtotime ( $searchDate ) ) ;
			$searchDate = date ( 'Y-m-j' , $searchDate );
			$command->bindParam(":searchdate",$searchDate,PDO::PARAM_STR);
			$command->execute();
		}
    }
    /**
     * 
     * Populates our temporary table with the number of rooms allocated on a particular day.
     * @param Reservation $reservation
     */
    private function updateRoomCounts($reservation)
    {
    	$bookingid = $reservation->getAttribute('bookingid');
    	$datefrom = $reservation->getAttribute('datefrom'); 
    	$dateto = $reservation->getAttribute('dateto');
    	$roomid = $reservation->getAttribute('roomid');
    	
    	$sql = "SELECT date(`datefrom`)as datefrom,date(`dateto`)as dateto FROM reservation WHERE ";
		$sql .= $this->GetOverlapCheckSQL();
		$sql .= " and roomid=:roomid";
		$sql .= " and confirmreservation=true";


		$command=$this->_connection->createCommand($sql);
		$command->bindParam(":datefrom",$datefrom);
		$command->bindParam(":dateto",$dateto);
		$command->bindParam(":roomid",$roomid);
		
		$rows=$command->queryAll();
		if(empty($rows))
			return false;
			
		/**
		 * Make sure we get a count populated for all the days inbetween our search date.
		 */
		$sql = "UPDATE tempreservationtable SET roomcount=roomcount+1 WHERE reserveddate=:reserveddate";
		$command=$this->_connection->createCommand($sql);
		
		foreach($rows as $row){
				$searchDate = $row['datefrom'];
				while(strtotime($searchDate) <= strtotime($row['dateto'])) {
					$command->bindParam(":reserveddate",$searchDate,PDO::PARAM_STR);
					$command->execute();
					$searchDate = strtotime ( '+1 day' , strtotime ( $searchDate ) ) ;
					$searchDate = date ( 'Y-m-j' , $searchDate );
				}
		}
    }
    /**
     * SQL for checking all the possible overlaps.
     */
	private function getOverlapCheckSQL()
	{
		$sql = "(`datefrom`=:datefrom or `dateto`=:dateto or ";
		$sql .= ":datefrom between `datefrom` and `dateto` or ";
		$sql .= ":dateto between `datefrom` and `dateto` or ";
		$sql .= " ((`datefrom`<=:datefrom and `dateto`>=:dateto)";
		$sql .= " or (`datefrom`>:datefrom and `datefrom`<:dateto) ";
		$sql .= " or (`datefrom`<:datefrom and (`dateto`<:dateto and `dateto`>:datefrom)) ";
		$sql .= " or (:datefrom<`datefrom` and :dateto>`dateto`)))";
		return $sql;
	}
	
}