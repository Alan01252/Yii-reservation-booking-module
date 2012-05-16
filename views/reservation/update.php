<?php
$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reservation', 'url'=>array('index')),
	array('label'=>'Create Reservation', 'url'=>array('create')),
	array('label'=>'View Reservation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Reservation', 'url'=>array('admin')),
);
?>

<h1>Update Reservation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>