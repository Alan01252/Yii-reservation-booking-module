<?php
$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->id,
);
?>

<h1>Reservation</h1>

<?php 
$this->widget('zii.widgets.CDetailView',array(
	'data'=>$model->reservationDetails,
	'attributes'=>array(
		'reservationid',
		'title',
		'firstname',
		'lastname',
		'contactnumber',
		'emailaddress',
		'postaddress',
		'city',
		'county',
		'country',
		'postcode',
		'otherinfo',
	),
)); 
?>

<?php
 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'roomid',
		'datefrom',
		'numberofnights',
		'dateto',
		'onlinepayment',
	),
)); 
?>
