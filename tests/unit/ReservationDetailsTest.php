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
class ReservationDetailsTest extends CTestCase
{
	public function testCreate()
	{
		$connection=Yii::app()->db;
		$sql = "delete from reservation";
		$command = $connection->createCommand($sql);
		$command->execute();
		
		$dateOverlapFromObj = new DateTime();
		$dateOverlapFrom = $dateOverlapFromObj->format('Y-m-d');
		
		$reservation = new Reservation();
		$reservation->setAttributes(array(
				'roomid' => 1,
				'datefrom' => $dateOverlapFrom,
				'numberofnights'=> 10,
				'confirmreservation'=>true,
				));

		$id = $reservation->save();

		$reservationdetails = new Reservationdetails();
		$reservationdetails->setAttributes(array(
				'reservationid' => $reservation->getAttribute('id'),
				'title' => "Mr",
				'firstname' => "John",
				'lastname' => "Smith",
				'contactnumber' => "0123456789",
				'emailaddress' => "john.smith@blankemailaddress.blanky.co.uk",
				'city' => "City",
				'county' => "County",
				'country' => "UK",
				'postcode' => "ab12 4cd",
				'postaddress' => 'Test postal address',
				'otherinfo' => "Test",
				));
		
		$this->assertTrue($reservationdetails->save());
		
		return $reservationdetails;
	}
	/**
	 * @depends testCreate
	 */
	public function testEdit()
	{
		$reservationdetails = Reservationdetails::model()->find('firstname=:firstname',array(':firstname'=>'John'));
		$reservationdetails->setAttribute('firstname','Joan');
		
		$this->assertTrue($reservationdetails->save());
		
		$reservationdetails = Reservationdetails::model()->find('firstname=:firstname',array(':firstname'=>'Joan'));
		$this->assertEquals($reservationdetails->firstname,"Joan");	
	}
	
	/**
	 * @depends testEdit
	 */
	public function testDelete()
	{	
		$reservationdetails = Reservationdetails::model()->find('firstname=:firstname',array('firstname'=>'Joan'));
		$this->assertTrue($reservationdetails->delete());
	}
	
}