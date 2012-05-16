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
	<?php echo $form->dropDownListRow($model,'roomid',CHtml::listData(RoomType::model()->findAll(),     
														    'id',     
														    'description'
														  )); ?>
	<?php echo $form->error($model,'roomid'); ?>
	<?php echo $form->datepickerRow($model,'datefrom',array('data-date-format'=>'yyyy-mm-dd')); ?>
	
	<?php echo $form->dropDownListRow($model,'numberofnights',array('1','2','3','4','5','6','7','8','9','10')); ?>
														  

	
	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</fieldset>
</div><!-- form -->