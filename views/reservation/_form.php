<div class="form">

<?php 


$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'id'=>'verticalForm',
    'type'=>'vertical',
));


?>
<fieldset>
	<legend><p class="note">Fields with <span class="required">*</span> are required.</p></legend>
	

	<?php echo $form->errorSummary($model,"Sorry we were unable to reserve that room:"); ?>
	
	<?php echo $form->dropDownListRow($model,'roomid',CHtml::listData(RoomType::model()->findAll(),'id','description')); ?>
	<?php echo $form->error($model,'roomid'); ?>
	<?php echo $form->datepickerRow($model,'datefrom',array('data-date-format'=>'yyyy-mm-dd')); ?>
	
	<?php 
	$numberOfNights = array();
	for($i=1; $i <= 30; $i++) {
		$numberOfNights[$i] = $i;
	}
	echo $form->dropDownListRow($model,'numberofnights',$numberOfNights); ?>
														  

	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
</fieldset>
</div><!-- form -->