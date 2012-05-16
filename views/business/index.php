<?php
$this->breadcrumbs=array(
	'Businesses',
);

$this->menu=array(
	array('label'=>'Create Business', 'url'=>array('create')),
	array('label'=>'Manage Business', 'url'=>array('admin')),
);
?>

<h1>Businesses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
