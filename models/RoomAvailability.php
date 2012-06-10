<?php
/**
*@author Alan Hollis http://alanhollis.com
*@copyright alan.hollis http://alanhollis.com
**/
class ReservationSheetRow
{
	private $description;
	
	private $date1;
	 
	public function __set($key,$val) {
		$this->$key=$val;
	}
	
	public function __get($key) {
		return $this->$key;
	}
	
}