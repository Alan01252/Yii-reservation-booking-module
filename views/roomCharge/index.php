<?php
$this->breadcrumbs=array(
	'Room Charges',
);

$this->menu=array(
	array('label'=>'Create Room Charge', 'url'=>array('create')),
	array('label'=>'Manage Room Charge', 'url'=>array('admin')),
);
?>
<h1>Room Charges</h1>

<?php $this->widget('bootstrap.widgets.BootGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'roomtype.description', 'header'=>'Description'),
        array('name'=>'price', 'header'=>'Price'),
        array(
            'class'=>'bootstrap.widgets.BootButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); 
?>
