<?php
$this->breadcrumbs=array(
	'Reservationdetails'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

?>
<div class="row">

	<div class="span6">
		<h1>Reservation Details</h1>
	</div>
	
	<div class="span6">
		<h1>Reservation</h1>
	</div>
</div>

<div class="row">

	<div class="span5">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
	
	<div class="span6 well">
		<?php 
		$this->widget('bootstrap.widgets.BootDetailView',array(
			'data'=>$model->reservation,
			'attributes'=>array(
				'roomtype.description',
				'datefrom',
				'numberofnights',
				'dateto',
			),
		)); 

		
		$this->widget('bootstrap.widgets.BootButton', array(
		'buttonType'=>'submit',
	    'label'=>'Jump to reservation',
	    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'mini', // '', 'large', 'small' or 'mini'
		'htmlOptions' => array('class'=>'pull-right','submit'=>array('reservation/update/','id'=>$model->reservation->id)),
		));
		?>
	</div>
</div>
