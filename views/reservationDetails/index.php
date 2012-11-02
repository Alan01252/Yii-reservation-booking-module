<?php
$this->breadcrumbs=array(
	'Reservationdetails',
);

$this->menu=array(
	array('label'=>'Create Reservationdetails','url'=>array('create')),
	array('label'=>'Manage Reservationdetails','url'=>array('admin')),
);
?>

<h1>Reservation Details</h1>

<?php $this->widget('zii.widgets.CListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
