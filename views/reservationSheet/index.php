<?php
$this->breadcrumbs=array(
	'Reservations',
);


$this->menu=array(
	array('label'=>'Create Reservation', 'url'=>array('create')),
	array('label'=>'Manage Reservation', 'url'=>array('admin')),
);
?>

<h1>Reservation Sheet</h1>


<?php 
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'reservationsheet',
));

echo $form->labelEx($reservationSheet,'datefrom');
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'attribute'=>'dateFrom',
		'model'=>$reservationSheet,
		'options'=>array(
				'dateFormat' => 'yy-mm-dd',
		),
		'htmlOptions'=>array(
				'style'=>'height:20px;'
		),
));
?>
<div class="row buttons">
<?php echo CHtml::submitButton('Submit'); ?>
</div>	

<?php $this->endWidget(); ?>

<?php 

$columns[] = array('name'=>'Room Type','value'=>'$data->getRoomTypeDescription()');
foreach($reservationSheet->dates as $date) {
	$columns[] = array('header'=>"{$date}",
						'class'=>'CLinkColumn',
						'urlExpression'=>'Yii::app()->createUrl("openbooking/reservation/search",
										  array("description"=>$data->getRoomTypeDescription(),"date"=>\''.$date.'\'))',
						'labelExpression'=> '$data->getReservationCount(\''.$date.'\').\' 
												of \'.$data->getTotalAvailableCount()');
}

$this->widget('zii.widgets.grid.CGridView', array(
		'columns'=>$columns,
		'dataProvider'=>new CArrayDataProvider($reservationSheet->rows,array('keyField'=>'id')),
));

?>

</div>