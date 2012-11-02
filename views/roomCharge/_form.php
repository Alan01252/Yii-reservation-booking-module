<?php $form=$this->beginWidget('CActiveForm',array(
	'id'=>'room-charges-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
	<?php 
	echo $form->label($model,'roomid');
	echo $form->dropDownList($model,'roomid',CHtml::listData(RoomType::model()->findAll(),     
														    'id',     
														    'description'
														  )); 
	echo $form->error($model,'roomid');
	?>

	</div>
	<div class="row">
	<?php 
	echo $form->label($model,'price');
	echo $form->textField($model,'price'); 
	echo $form->error($model,'price');
	?>
	</div>
	<div class="row buttons">
	<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
