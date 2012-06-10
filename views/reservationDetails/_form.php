<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'reservationdetails-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'firstname',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'lastname',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'contactnumber',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'emailaddress',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'postaddress',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'county',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'country',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'postcode',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'otherinfo',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
