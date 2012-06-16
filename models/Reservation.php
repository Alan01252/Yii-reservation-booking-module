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
 * 
 * This is the model class for table "reservation".
 *
 * The followings are the available columns in table 'reservation':
 * @property integer $id
 * @property string $bookingid
 * @property string $roomid
 * @property string $datefrom
 * @property string $dateto
 */
class Reservation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Reservation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reservation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('roomid, datefrom', 'required'),
				array('roomid', 'length', 'max'=>20),
				array('numberofnights', 'type', 'type'=>'integer'),
				array('onlinepayment', 'type', 'type'=>'integer'),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, roomid, datefrom, dateto', 'safe', 'on'=>'search')
			);
	}
	/**
	 * Loads behavious from the params array so we can adjust how we do per hotel.
	 */
	public function behaviors()
	{
		$reservationBehaviors = Yii::app()->controller->module->reservationbehaviors;
		foreach($reservationBehaviors as $behavior){
				$behavior = array('class'=>'openbooking.extensions.reservationbehaviors.'.$behavior);
				$behaviors[] = $behavior;
		}
		return $behaviors;
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('roomtype'=>array(self::BELONGS_TO,'RoomType','roomid'),
					 'reservationDetails'=>array(self::HAS_ONE,'ReservationDetails','reservationid')
				);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
	
		return array(
			'id' => 'ID',
			'roomid' => 'Room ID',
			'datefrom' => 'Date From',
			'dateto' => 'Date To',
			'numberofnights' => 'Number of nights'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($date,$roomTypeDescription)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition='(:date between dateFrom and dateTo) and roomtype.description=:roomTypeDescription';
		$criteria->join = 'LEFT JOIN roomtype ON roomtype.id = roomid ';
		$criteria->params=array(":date"=>$date,":roomTypeDescription"=>$roomTypeDescription);
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	


	/**
	 * Set price onlinepayment amount for this reservation
	 * (non-PHPdoc)
	 * @see CActiveRecord::beforesave()
	 */
	public function beforeSave() {

		//Make sure we have a date to.
		if(empty($this->dateto)) {
			$this->updateDateTo();
		}
		
		if(empty($this->onlinepayment)) {
			$criteria=new CDbCriteria;
			$criteria->select = 'price';
			$criteria->condition = 'roomid=:roomid';
			$criteria->params = array(':roomid'=>$this->roomid);
			$model = RoomCharge::model()->find($criteria);
			$this->setAttribute('onlinepayment', $model->price);
		}
		
		return parent::beforeSave();
	}
	/**
	 * Updates the date to to be based on the number of the nights.
	 * This is because in the database we store the dates the room is reserved for, which isn't the same as the checkout date which
	 * hotel owners expect as the dateto.
	 */
	private function updateDateTo()
	{
		$tempDateTo = new DateTime();
		$tempDateTo = DateTime::createFromFormat('Y-m-d',$this->datefrom);
		$tempDateTo->add(new DateInterval('P'.$this->numberofnights."D"));
		$this->setAttribute('dateto', $tempDateTo->format('Y-m-d'));
	}
	
	public function afterFind()
	{
		$this->updateDateTo();
		parent::afterFind();
	}
	
	
    
	
}