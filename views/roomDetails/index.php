<?php
$this->breadcrumbs=array(
	'Room Details',
);

$this->menu=array(
	array('label'=>'Create RoomDetails', 'url'=>array('create')),
	array('label'=>'Manage RoomDetails', 'url'=>array('admin')),
);
?>

<h1>Room Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
