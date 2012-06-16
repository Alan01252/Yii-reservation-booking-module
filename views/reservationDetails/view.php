<?php
$this->breadcrumbs=array(
	'Reservationdetails'=>array('index'),
	$model->title,
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
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $reservation->roomtype->description ?></td>
      <td><?php echo $reservation->datefrom ?></td>
      <td><?php echo $reservation->dateto ?></td>
      <td><?php echo $reservation->onlinepayment ?></td>
    </tr>
  </tbody>
</table>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'reservationid',
		'title',
		'firstname',
		'lastname',
		'contactnumber',
		'emailaddress',
		'postaddress',
		'city',
		'county',
		'country',
		'postcode',
		'otherinfo',
	),
)); ?>
