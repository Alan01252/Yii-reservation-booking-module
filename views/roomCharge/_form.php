<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'room-charges-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->dropDownListRow($model,'roomid',CHtml::listData(RoomType::model()->findAll(),     
														    'id',     
														    'description'
														  )); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
