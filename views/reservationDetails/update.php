<?php
$this->breadcrumbs=array(
	'Reservationdetails'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reservationdetails','url'=>array('index')),
	array('label'=>'Create Reservationdetails','url'=>array('create')),
	array('label'=>'View Reservationdetails','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Reservationdetails','url'=>array('admin')),
);
?>

<h1>Update Reservationdetails <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>