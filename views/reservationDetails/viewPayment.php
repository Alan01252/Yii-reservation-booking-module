<?php
$this->breadcrumbs=array(
	'Reservationdetails'=>array('index'),
	$reservation->reservationDetails->title,
);
?>

<div class="row">
	<div class="span6">
		<h1>Pay Now</h1>
	</div>
	<div class="span6">
		<h1>Reservation Details</h1>
	</div>
</div>

<div class="row">
	<div class="span5">
		<!-- Loop through payment options -->
		<h3>PayPal</h3>
		<h3>Google Checkout</h3>
		<h3>Sage Pay</h3>
	</div>
	
	<div class="span6 well">
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
		
		<?php 
		$this->widget('zii.widgets.CDetailView',array(
			'data'=>$reservation->reservationDetails,
			'attributes'=>array(
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
		)); 
		?>
	</div>

</div>
