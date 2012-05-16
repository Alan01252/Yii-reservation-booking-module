<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roomid')); ?>:</b>
	<?php echo CHtml::encode($data->roomid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detailkey')); ?>:</b>
	<?php echo CHtml::encode($data->detailkey); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detailvalue')); ?>:</b>
	<?php echo CHtml::encode($data->detailvalue); ?>
	<br />


</div>