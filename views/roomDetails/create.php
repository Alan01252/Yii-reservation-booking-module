<?php
$this->breadcrumbs=array(
	'Room Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomDetails', 'url'=>array('index')),
	array('label'=>'Manage RoomDetails', 'url'=>array('admin')),
);
?>

<h1>Create RoomDetails</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>