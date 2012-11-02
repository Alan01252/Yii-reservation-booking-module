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
	<h1>Reservation</h1>
</div>

<div class="row">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>

<div class="row">	
<h1>Reservation Details</h1>
<?php 		
if($model->reservationDetails) {
	
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
	<div class="row buttons">
		<?php echo CHtml::submitButton('Edit reservation details',
										array('submit'=>array('reservationDetails/update/',
																'id'=>$model->reservationDetails->id))
				); 
		?>
	</div>

<?php 
}
?>
