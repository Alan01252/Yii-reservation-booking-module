<div class="view">

	<b><?php 
	
	echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reservationid')); ?>:</b>
	<?php echo CHtml::encode($data->reservationid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
	<?php echo CHtml::encode($data->firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contactnumber')); ?>:</b>
	<?php echo CHtml::encode($data->contactnumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emailaddress')); ?>:</b>
	<?php echo CHtml::encode($data->emailaddress); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('postaddress')); ?>:</b>
	<?php echo CHtml::encode($data->postaddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('county')); ?>:</b>
	<?php echo CHtml::encode($data->county); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postcode')); ?>:</b>
	<?php echo CHtml::encode($data->postcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otherinfo')); ?>:</b>
	<?php echo CHtml::encode($data->otherinfo); ?>
	<br />

	*/ ?>

</div>