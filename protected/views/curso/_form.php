<?php
/* @var $this CursoController */
/* @var $model Curso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'curso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institucion'); ?>
		<?php echo $form->textField($model,'institucion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'institucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idProfesor'); ?>
		<!-- ?php echo $form->textField($model,'idProfesor'); ?> -->
		<?php $lista = CHtml::listData($todosLosProfesores, 'idProfesor','nombre') ?>
		<?php echo $form->dropDownList(
			$model,
			'idProfesor',
			$lista,
			array('prompt'=>'Seleccione Profesor')
		); ?>
		<?php echo $form->error($model,'idProfesor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->