<?php
$this->breadcrumbs=array(
	'Reservations',
);

$this->menu=array(
	array('label'=>'Create Reservation', 'url'=>array('create')),
);
?>

<h1>Reservations</h1>

<?php $this->widget('bootstrap.widgets.BootGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
    	array('name'=>'reservationDetails.firstname', 'header'=>'First name'),
    	array('name'=>'reservationDetails.lastname', 'header'=>'Last name'),
        array('name'=>'roomtype.description', 'header'=>'Room Type'),
        array('name'=>'datefrom', 'header'=>'Date From'),
    	array('name'=>'numberofnights', 'header'=>'Number Of Nights'),
        array('name'=>'dateto', 'header'=>'Date To'),
        array(
            'class'=>'bootstrap.widgets.BootButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); 
?>
