<?php
$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->id,
);
?>

<div class="row">

	<div class="span6">
		<h1>Reservation</h1>
	</div>
	
</div>

<div class="row">
	<div class="span6">
		<?php 
		$this->widget('bootstrap.widgets.BootDetailView',array(
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
	</div>
	
	<div class="span6">
		<?php
		 $this->widget('bootstrap.widgets.BootDetailView', array(
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
	</div>

</div>
