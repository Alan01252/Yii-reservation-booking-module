<div class="form">

<?php 
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'reservation-form',
));
?>
<fieldset>
	<legend>
		<p class="note">Fields with <span class="required">*</span> are required.</p>
	</legend>
	
	<?php echo $form->errorSummary($model,"Sorry we were unable to reserve that room:"); ?>
	<div class="row">
	<?php echo $form->labelEx($model,'roomid'); ?>
	<?php echo $form->dropDownList($model,'roomid',CHtml::listData(RoomType::model()->findAll(),'id','description')); ?>
	<?php echo $form->error($model,'roomid'); ?>
	</div>
	<div class="row">
	<?php 
	echo $form->labelEx($model,'datefrom');
	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'attribute'=>'datefrom',
			'model'=>$model,
			'options'=>array(
				'dateFormat' => 'yy-mm-dd',
			),
			'htmlOptions'=>array(
					'style'=>'height:20px;'
			),
	));
	?>
	</div>
	<div class="row">
	<?php 
	$numberOfNights = array();
	for($i=1; $i <= 30; $i++) {
		$numberOfNights[$i] = $i;
	}
	echo $form->labelEx($model,'numberofnights');
	echo $form->dropDownList($model,'numberofnights',$numberOfNights); ?>
	</div>
	
	<div class="row buttons">
	<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
</fieldset>
</div><!-- form -->