<?php
$this->breadcrumbs=array(
	'Reservationdetails'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

?>
<div class="row">
<h1>Reservation Details</h1>


<div>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
	
<div class="row">
<?php 
	$this->widget('zii.widgets.CDetailView',array(
		'data'=>$model->reservation,
		'attributes'=>array(
			'roomtype.description',
			'datefrom',
			'numberofnights',
			'dateto',
		),
	)); 
	
	echo CHtml::submitButton('Edit reservation',
			array('submit'=>array('reservation/update/',
					'id'=>$model->reservation->id))
	);

?>
</div>
