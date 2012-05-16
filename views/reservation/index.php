<?php
$this->breadcrumbs=array(
	'Reservations',
);

$this->menu=array(
	array('label'=>'Create Reservation', 'url'=>array('create')),
	array('label'=>'Manage Reservation', 'url'=>array('admin')),
);
?>

<h1>Reservations</h1>

<?php $this->widget('bootstrap.widgets.BootGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'roomid', 'header'=>'Room ID'),
        array('name'=>'datefrom', 'header'=>'Date From'),
        array('name'=>'dateto', 'header'=>'Date To'),
        array(
            'class'=>'bootstrap.widgets.BootButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); 
?>
