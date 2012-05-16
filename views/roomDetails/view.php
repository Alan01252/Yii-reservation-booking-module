<?php
$this->breadcrumbs=array(
	'Room Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomDetails', 'url'=>array('index')),
	array('label'=>'Create RoomDetails', 'url'=>array('create')),
	array('label'=>'Update RoomDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RoomDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomDetails', 'url'=>array('admin')),
);
?>

<h1>View RoomDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'roomid',
		'detailkey',
		'detailvalue',
	),
)); ?>
