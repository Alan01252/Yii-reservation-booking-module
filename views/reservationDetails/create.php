<?php
$this->breadcrumbs=array(
	'Reservationdetails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reservationdetails','url'=>array('index')),
	array('label'=>'Manage Reservationdetails','url'=>array('admin')),
);

?>
<h1>Reservation Details</h1>

<table class="table">
  <thead>
    <tr>
      <th>Room Type</th>
      <th>Date From</th>
      <th>Date To</th>
      <th>Online Payment</th>
      <th>Rooms Left</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $reservation->roomtype->description ?></td>
      <td><?php echo $reservation->datefrom ?></td>
      <td><?php echo $reservation->dateto ?></td>
      <td><?php echo $reservation->onlinepayment ?></td>
      <td><?php echo $reservation->roomsavailable ?></td>
    </tr>
  </tbody>
</table>

<?php echo $this->renderPartial('_form', array('model'=>$model,'reservation'=>$reservation)); ?>