<?php
/**
*@author Alan Hollis http://alanhollis.com
*@copyright alan.hollis http://alanhollis.com
**/
class ReservationSheetRow
{
	private $roomType;
	private $reservations = Array();
	
	public function getRoomTypeDescription()
	{
		return $this->roomType->description;
	}
	
	public function getReservationCount($date)
	{
		if(count($this->reservations[$date]) > 0)
			return count($this->reservations[$date]);
		
		return 0;
	}
	
	public function getTotalAvailableCount()
	{
		return $this->roomType->quantity;
	}
	
	public function populate($roomType,$dates)
	{
		$this->roomType = $roomType;
			
		foreach($dates as $date) {
		
			$criteria=new CDbCriteria();
			$criteria->condition=':date between dateFrom and dateTo 
									and roomid=:roomId
									and confirmreservation=true';
			$criteria->params=array(":date"=>$date,":roomId"=>$this->roomType->id);
			$result = Reservation::model()->findAll($criteria);
		
			$this->reservations[$date] = $result;
		}
	}
	
}