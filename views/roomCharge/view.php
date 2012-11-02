<?php
$this->breadcrumbs=array(
	'Room Charges'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomCharges','url'=>array('index')),
	array('label'=>'Create RoomCharges','url'=>array('create')),
	array('label'=>'Update RoomCharges','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete RoomCharges','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomCharges','url'=>array('admin')),
);
?>

<h1>View Room Charge #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'roomtype.description',
		'price',
	),
));
 ?>
