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

<?php $this->widget('zii.widgets.grid.CGridView', array(

    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'roomtype.description', 'header'=>'Description'),
        array('name'=>'price', 'header'=>'Price'),
        array(
            'class'=>'CButtonColumn',
 
        ),
    ),
)); 
?>
