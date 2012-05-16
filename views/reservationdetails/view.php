<?php
$this->breadcrumbs=array(
	'Reservationdetails'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Reservationdetails','url'=>array('index')),
	array('label'=>'Create Reservationdetails','url'=>array('create')),
	array('label'=>'Update Reservationdetails','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Reservationdetails','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reservationdetails','url'=>array('admin')),
);
?>

<h1>View Reservationdetails #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
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
)); ?>
