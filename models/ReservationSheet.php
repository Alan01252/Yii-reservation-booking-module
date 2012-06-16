<?php
/**
*@author Alan Hollis http://alanhollis.com
*@copyright alan.hollis http://alanhollis.com
**/
class ReservationSheet extends CActiveRecord
{
	//Date to populate our sheet from
	public $dateFrom;
	//Array of dates found
	private $dates = Array();
	//Rows reservation sheet.
	private $rows = Array();
	
	private $_connection;
	
	public function __construct($dateFrom)
	{
		$this->_connection=Yii::app()->db;
		$this->dateFrom = $dateFrom;
	}
	
	public function populate()
	{
		$this->populateDates();
		$this->populateRows();
	}
	
	/**
	 * Get the rows for the call sheet by querying the database
	 * @return array ReserverationSheetRows
	 */
	private function populateRows()
	{
		$roomTypes = RoomType::model()->findAll();
		
		$rows = Array();
		
		foreach($roomTypes as $roomType) {
			
			$reservationSheetRow = new ReservationSheetRow();
			$reservationSheetRow->populate($roomType,$this->dates);
			
			$this->rows[] = $reservationSheetRow;
		}
	}
	
	private function populateDates()
	{
		$dateTo = strtotime ( '+7 day' , strtotime ( $this->dateFrom ) ) ;
		$dateTo = date ( 'Y-m-j' , $dateTo );
		

		$searchDate = $this->dateFrom;
		while(strtotime($searchDate) <= strtotime($dateTo)) {	
			
			$this->dates[] = $searchDate;
		
			$searchDate = strtotime ( '+1 day' , strtotime ( $searchDate ) ) ;
			$searchDate = date ( 'Y-m-j' , $searchDate );
		}
	}
	
	public function __set($key,$val) {
		$this->$key=$val;
	}
	
	public function __get($key) {
		return $this->$key;
	}
	
}


