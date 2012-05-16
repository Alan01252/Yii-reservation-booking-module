<?php
$this->breadcrumbs=array(
	'Room Charge'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomCharges','url'=>array('index')),
	array('label'=>'Create RoomCharges','url'=>array('create')),
	array('label'=>'View RoomCharges','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage RoomCharges','url'=>array('admin')),
);
?>

<h1>Update RoomCharges <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>