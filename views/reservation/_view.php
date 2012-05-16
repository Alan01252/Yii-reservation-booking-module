<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bookingid')); ?>:</b>
	<?php echo CHtml::encode($data->bookingid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roomid')); ?>:</b>
	<?php echo CHtml::encode($data->roomid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datefrom')); ?>:</b>
	<?php echo CHtml::encode($data->datefrom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateto')); ?>:</b>
	<?php echo CHtml::encode($data->dateto); ?>
	<br />


</div>