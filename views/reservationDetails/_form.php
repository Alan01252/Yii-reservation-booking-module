<?php 
	$form = $this->beginWidget('CActiveForm', array(
	    'id'=>'reservation-form',
	));

	echo $form->errorSummary($model,"Sorry we were unable to create that reservation");
?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
	<?php 
	echo $form->labelEx($model,'title');
	echo $form->textField($model,'title',array('maxlength'=>3));
	echo $form->error($model,'title');
	?>
	</div>
	<div class="row">
	
	<?php 
	echo $form->labelEx($model,'firstname');
	echo $form->textField($model,'firstname',array('maxlength'=>255)); 
	echo $form->error($model,'firstname');
	?>
	</div>
	<div class="row">
	<?php 
	echo $form->labelEx($model,'lastname');
	echo $form->textField($model,'lastname',array('maxlength'=>255)); 
	echo $form->error($model,'lastname');
	?>
	</div>
	<div class="row">
	<?php 
	echo $form->labelEx($model,'contactnumber');
	echo $form->textField($model,'contactnumber',array('maxlength'=>20)); 
	echo $form->error($model,'contactnumber');
	?>
	</div>
	<div class="row">
	<?php 
	echo $form->labelEx($model,'emailaddress');
	echo $form->textField($model,'emailaddress',array('maxlength'=>255)); 
	echo $form->error($model,'emailaddress');
	?>
	</div>
	<div class="row">
	<?php 
	echo $form->labelEx($model,'postaddress');
	echo $form->textField($model,'postaddress',array('maxlength'=>255)); 
	echo $form->error($model,'postaddress');
	?>
	</div>
	<div class="row">
	<?php 
	echo $form->labelEx($model,'city');
	echo $form->textField($model,'city',array('maxlength'=>255)); 
	echo $form->error($model,'city');
	?>
	</div>
	<div class="row">
	<?php 
	echo $form->labelEx($model,'county');
	echo $form->textField($model,'county',array('maxlength'=>255)); 
	echo $form->error($model,'county');
	?>
	</div>
	<div class="row">
	<?php 
	echo $form->labelEx($model,'country');
	echo $form->textField($model,'country',array('maxlength'=>255)); 
	echo $form->error($model,'country');
	?>
	</div>
	<div class="row">
	<?php 
	echo $form->labelEx($model,'postcode');
	echo $form->textField($model,'postcode',array('maxlength'=>10));
	echo $form->error($model,'postcode');
	?>
	</div>
	<div class="row">
	<?php 
	echo $form->labelEx($model,'otherinfo');
	echo $form->textArea($model,'otherinfo'); 
	echo $form->error($model,'otherinfo');
	?>
	</div>

	
	<div class="row buttons">
	<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
