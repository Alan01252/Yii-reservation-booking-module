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


$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'id'=>'verticalForm',
    'type'=>'vertical',
));


?>
<?php 
		echo $form->datepickerRow($reservationSheet,'dateFrom',array('data-date-format'=>'yyyy-mm-dd')); 
?>
<br>
<?php 
		$this->widget('bootstrap.widgets.BootButton', array(
				'buttonType'=>'submit',
				'label'=>'Jump to date',
				'type'=>'primary',
				'size'=>'small',
				'htmlOptions' => array('submit'=>array('reservationSheet/index')),

		));
		?>		


<?php $this->endWidget(); ?>

<div id="yw7" class="grid-view">
<table class="items table">
<thead>
	<tr>
		<td>Room Type</td>
		<?php foreach($reservationSheet->dates as $date): ?>
	 	<td><?= $date ?></td>
		<?php endforeach;?>
	</tr>
</thead>

<tbody>
<?php 
foreach($reservationSheet->rows as $row):?>
<tr class="odd">
	<td style="width: 60px">
		<?=
			$row->getRoomTypeDescription();
		?>
	</td>
	<?php foreach($reservationSheet->dates as $date): ?>
		<td><?php echo CHtml::link( $row->getReservationCount($date).' of '.$row->getTotalAvailableCount(),			
									array('reservation/search','description'=>$row->getRoomTypeDescription(),'date'=>$date)); 
			?>
	</td>
	<?php endforeach;?>
<?php 
endforeach;
?>
</tbody>
</table>
</div>