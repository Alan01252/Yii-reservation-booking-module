<?php $form=$this->beginWidget('CActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->textField($model,'id'); ?>
	</div>
	<div class="row">
	<?php echo $form->textField($model,'reservationid'); ?>
	</div>
	
	<div class="row">
	<?php echo $form->textField($model,'title',array('maxlength'=>3)); ?>
	</div>
	<?php echo $form->textField($model,'firstname',array('maxlength'=>255)); ?>
	<div class="row">
	<?php echo $form->textField($model,'lastname',array('maxlength'=>255)); ?>
	</div>
	<?php echo $form->textField($model,'contactnumber',array('maxlength'=>20)); ?>
	<div class="row">
	<?php echo $form->textField($model,'emailaddress',array('maxlength'=>255)); ?>
	</div>
	<?php echo $form->textField($model,'postaddress',array('maxlength'=>255)); ?>
	<div class="row">
	<?php echo $form->textField($model,'city',array('maxlength'=>255)); ?>
	</div>
	<?php echo $form->textField($model,'county',array('maxlength'=>255)); ?>
	<div class="row">
	<?php echo $form->textField($model,'country',array('maxlength'=>255)); ?>
	</div>
	<?php echo $form->textField($model,'postcode',array('maxlength'=>10)); ?>
	<div class="row">
	<?php echo $form->textField($model,'otherinfo',array('maxlength'=>255)); ?>
	</div>
	
	<div class="row buttons">
	<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
