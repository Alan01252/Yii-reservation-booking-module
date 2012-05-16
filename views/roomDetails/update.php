<?php
$this->breadcrumbs=array(
	'Room Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomDetails', 'url'=>array('index')),
	array('label'=>'Create RoomDetails', 'url'=>array('create')),
	array('label'=>'View RoomDetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RoomDetails', 'url'=>array('admin')),
);
?>

<h1>Update RoomDetails <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>