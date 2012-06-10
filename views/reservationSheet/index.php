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
		<td><?= $row->getReservationCount($date) ?> of <?= $row->getTotalAvailableCount() ?>  </td>
	<?php endforeach;?>
<?php 
endforeach;
?>
</tbody>
</table>
</div>