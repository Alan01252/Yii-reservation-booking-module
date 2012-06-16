<?php
$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->id,
);
?>

<div class="row">
	<div class="span6">
		<h1>Reservation</h1>
	</div>
	
	<div class="span6">
		<h1>Reservation Details</h1>
	</div>
</div>

<div class="row">

	<div class="span5">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
	
	<div class="span6 well">
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

		$this->widget('bootstrap.widgets.BootButton', array(
				'buttonType'=>'submit',
				'label'=>'Jump to reservation details',
				'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				'size'=>'mini', // '', 'large', 'small' or 'mini'
				'htmlOptions' => array('class'=>'pull-right','submit'=>array('reservationDetails/update/','id'=>$model->reservationDetails->id)),

		));
		
		?>
		
	</div>
</div>
