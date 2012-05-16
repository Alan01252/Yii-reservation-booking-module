<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-details-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'roomid'); ?>
		<?php echo $form->textField($model,'roomid'); ?>
		<?php echo $form->error($model,'roomid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detailkey'); ?>
		<?php echo $form->textField($model,'detailkey',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'detailkey'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detailvalue'); ?>
		<?php echo $form->textField($model,'detailvalue',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'detailvalue'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->