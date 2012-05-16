<?php
$this->breadcrumbs=array(
	'Businesses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Business', 'url'=>array('index')),
	array('label'=>'Manage Business', 'url'=>array('admin')),
);
?>

<h1>Create Business</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>