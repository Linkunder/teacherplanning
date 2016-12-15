<?php
/* @var $this AnotacionController */
/* @var $model Anotacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'anotacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'action' =>'/teacherplanning/index.php?r=anotacion/create',
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row" hidden>
		<?php echo $form->labelEx($model,'idAlumno'); ?>
		<?php echo $form->numberField($model, 'idAlumno'); ?>
		<?php echo $form->error($model,'idAlumno'); ?>
	</div>

	<input type="number" name="modal" value="1" hidden />


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Listo' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->