<?php
$this->breadcrumbs=array(
	'Room Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomType', 'url'=>array('index')),
	array('label'=>'Create RoomType', 'url'=>array('create')),
	array('label'=>'Update RoomType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RoomType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomType', 'url'=>array('admin')),
);
?>

<h1>View RoomType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'quantity',
	),
)); ?>
