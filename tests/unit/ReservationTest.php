<?php
/**
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
class ReservationTest extends CTestCase
{
	private $_dateOverlapFromObj;
	private $_dateOverlapToObj;
	
	private $_dateOverlapFrom;
	private $_dateOverlapTo;
	
	private $_numberofnights;
	
	
	public function __construct()
	{
		$this->resetDateTimes();
	}
	
	public function resetDateTimes()
	{
		$this->_dateOverlapFromObj = new DateTime();
		$this->_dateOverlapToObj =  DateTime::createFromFormat('Y-m-d',$this->_dateOverlapFromObj->format('Y-m-d'));
		$this->_dateOverlapToObj->add(new DateInterval('P10D'));
		
		$this->_dateOverlapFrom = $this->_dateOverlapFromObj ->format('Y-m-d');
		$this->_dateOverlapTo = $this->_dateOverlapToObj->format('Y-m-d');
		
		$this->_numberofnights = 10;
	}
	
	public function resetReservationTable()
	{
		$connection=Yii::app()->db;
		$sql = "delete from reservation";
		$command = $connection->createCommand($sql);
		$command->execute();
	}
	
	public function testCreate()
	{
		$this->resetReservationTable();
		$this->resetDateTimes();
		
		$reservation = new Reservation();
		$reservation->setAttributes(array(
				'roomid' => 1,
				'datefrom' => $this->_dateOverlapFrom,
				'numberofnights'=> $this->_numberofnights,
				));

		$this->assertTrue($reservation->save());
		
	}
	/**
	 * Test we can delete the reservation
	 */
	public function testDelete()
	{
		$this->resetReservationTable();
		$this->resetDateTimes();
		
		$reservation = new Reservation();
		$reservation->setAttributes(array(
				'roomid' => 1,
				'datefrom' => $this->_dateOverlapFrom,
				'numberofnights'=> $this->_numberofnights,
				));
		$reservation->save(false);
		$this->assertTrue($reservation->delete());
	}
	/**
	 * Test we can update the reservation.
	 */
	public function testUpdate()
	{
		$this->resetReservationTable();
		$this->resetDateTimes();
		
		$reservation = new Reservation();
		$reservation->setAttributes(array(
				'roomid' => 1,
				'datefrom' => $this->_dateOverlapFrom,
				'numberofnights'=> $this->_numberofnights,
				));
		$reservation->save(false);	
		$newDateTo =  DateTime::createFromFormat('Y-m-d',$this->_dateOverlapToObj->format('Y-m-d'));;
		$newDateTo->add(new DateInterval('P10D'));


		$reservation = Reservation::model()->findByPk($reservation->getAttribute('id'));
		$reservation->setAttribute('dateto',$newDateTo->format('Y-m-d'));
		$reservation->setAttribute('confirmreservation',true);
		
		//must run validation rules
		$this->assertTrue($reservation->save());
	
		
		$reservation = Reservation::model()->findByPk($reservation->getAttribute('id'));
		$this->assertEquals($newDateTo->format('Y-m-d'),$reservation->dateto);	

		
	}
	
	/**
	 * Test adding multiple bookings to make sure we correctly return false when there are no 
	 * more bookings available.
	 */
	public function testNoReservationsAvailable()
	{
		$this->resetReservationTable();
		$this->resetDateTimes();
		
		//We should be able to reserver two rooms max, as this is the quantity of the room type
		$reservation = new Reservation();
		$reservation->setAttributes(array(
				'roomid' => 1,
				'datefrom' => $this->_dateOverlapFrom,
				'numberofnights'=> $this->_numberofnights,
				));
		$this->assertTrue($reservation->save());
		
		$reservation = new Reservation();
		$reservation->setAttributes(array(
				'roomid' => 1,
				'datefrom' => $this->_dateOverlapFrom,
				'numberofnights'=> $this->_numberofnights,
				));
		$this->assertTrue($reservation->save());
		

		/**
		 * Test the date overlapping works correctly
		 *                                        Date From |------| Date To
		 * *************************************************************************************
		 * Original Reservation                      |---------------|
		 * Case 1                                    |---------------|
		 * Case 2                              |--------------------------|
		 * Case 3                                         |------|
		 * Case 4                              |-------------|
		 * Case 5                                            |------------------|
		 * *************************************************************************************
		 */
		$this->noReservationsAvailableCase1($reservation);
		$this->noReservationsAvailableCase2($reservation);
		$this->noReservationsAvailableCase3($reservation);
		$this->noReservationsAvailableCase4($reservation);
		$this->noReservationsAvailableCase5($reservation);

	}
	
	/**
	 * Test to make sure a booking made at the same date and time as another booking with no available reservations fails. 
	 *
	 * Original Reservation                      |---------------|
	 * Case 1                                    |---------------|
	 * 
	 * @param Reservation An existing reservation 
	 * @depends testNoReservationsAvailable
	 */
	public function noReservationsAvailableCase1()
	{	
		$reservation = new Reservation();
		$reservation->setAttributes(array(
				'roomid' => 1,
				'datefrom' => $this->_dateOverlapFrom,
				'numberofnights'=> $this->_numberofnights,
				));
		$this->assertFalse($reservation->save()); 
	}
	
	/**
	 * Test to make sure a reservation with a datefrom before our reservation and a date to after our reservation cannot be made
	 * 
	 * Original Reservation                      |---------------|
	 * Case 2                              |--------------------------|
	 * 
	 * @param Reservation $reservation
	 * @depends testNoReservationsAvailable
	 */
	public function noReservationsAvailableCase2($reservation)
	{	
		$newDateFrom = new DateTime();
		$newDateFrom = DateTime::createFromFormat('Y-m-d',$this->_dateOverlapFromObj->format('Y-m-d'));
		
		$newDateFrom->add(new DateInterval('P1D'));
	
		
		$reservation = new Reservation();
		$reservation->setAttributes(array(
				'roomid' => 1,
				'datefrom' => $newDateFrom->format('Y-m-d'),
				'numberofnights'=> $this->_numberofnights + 1,
				));
					
		$this->assertFalse($reservation->save()); 
	}
	
	/**
	 * Test to make sure a reservation with a datefrom and dateto between our existing reservation and date cannot be made.
	 * Original Reservation                      |---------------|
	 * Case 3                                         |------|
	 * 
	 * @param Reservation $reservation
	 * @depends testNoReservationsAvailable
	 */
	public function noReservationsAvailableCase3($reservation)
	{
		$newDateFrom = new DateTime();
		$newDateFrom = DateTime::createFromFormat('Y-m-d',$this->_dateOverlapFromObj->format('Y-m-d'));
		$newDateFrom->add(new DateInterval('P1D'));


		$reservation = new Reservation();
		$reservation->setAttributes(array(
				'roomid' => 1,
				'datefrom' => $newDateFrom->format('Y-m-d'),
				'numberofnights'=> $this->_numberofnights - 1,
				));
		
		$this->assertFalse($reservation->save()); 
	}
	
	
	/**
	 * Test to make sure a reservation with a datefrom before our existing reservations datefrom and a dateto before our existing
	 * reservations dateto cannot be made.
	 * 
	 * Original Reservation                      |---------------|
	 * Case 4                              |-------------|
	 * 
	 * @param Reservation $reservation
	 * @depends testNoReservationsAvailable
	 */
	public function noReservationsAvailableCase4($reservation)
	{
		$newDateFrom = new DateTime();
		$newDateFrom = DateTime::createFromFormat('Y-m-d',$this->_dateOverlapFromObj->format('Y-m-d'));
		$newDateFrom->sub(new DateInterval('P1D'));

		
		$reservation = new Reservation();
		$reservation->setAttributes(array(
				'roomid' => 1,
				'datefrom' => $newDateFrom->format('Y-m-d'),
				'numberofnights'=> $this->_numberofnights - 1,
				));
		

		
		$this->assertFalse($reservation->save()); 
	}
	
	
	/**
	 * Test to make sure a reservation with a datefrom greater than our existing reservation
	 * and dateto after our existing reservations dateto cannot be made.
	 * 
	 * Original Reservation                      |---------------|
	 * Case 5                                            |------------------|
	 * 
	 * @param Reservation $reservation
	 * @depends testNoReservationsAvailable
	 */
	public function noReservationsAvailableCase5($reservation)
	{
		$newDateFrom = new DateTime();
		$newDateFrom = DateTime::createFromFormat('Y-m-d',$this->_dateOverlapFromObj->format('Y-m-d'));
		$newDateFrom->add(new DateInterval('P1D'));

		
		
		$reservation = new Reservation();
		$reservation->setAttributes(array(
				'roomid' => 1,
				'datefrom' => $newDateFrom->format('Y-m-d'),
				'numberofnights'=> $this->_numberofnights + 1,
				));
		
		$this->assertFalse($reservation->save()); 
	}
	
	
	
}