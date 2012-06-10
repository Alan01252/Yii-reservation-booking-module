<?php
$this->breadcrumbs=array(
	'Reservationdetails',
);

$this->menu=array(
	array('label'=>'Create Reservationdetails','url'=>array('create')),
	array('label'=>'Manage Reservationdetails','url'=>array('admin')),
);
?>

<h1>Reservationdetails</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
