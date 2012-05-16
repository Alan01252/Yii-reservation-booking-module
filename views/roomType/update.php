<?php
$this->breadcrumbs=array(
	'Room Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomType', 'url'=>array('index')),
	array('label'=>'Create RoomType', 'url'=>array('create')),
	array('label'=>'View RoomType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RoomType', 'url'=>array('admin')),
);
?>

<h1>Update RoomType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>