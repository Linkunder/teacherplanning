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

	'action' =>'/teacherplanning/index.php?r=curso/create',
)); ?>

	<p class="note"><span class="required">*</span> Campos obligatorios</p>

	<?php echo $form->errorSummary($modelCurso); ?>

	<div class="row">
		<?php echo $form->labelEx($modelCurso,'nombre'); ?>
		<?php echo $form->textField($modelCurso,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelCurso,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelCurso,'institucion'); ?>
		<?php echo $form->textField($modelCurso,'institucion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelCurso,'institucion'); ?>
	</div>


	<div class="row" hidden >
		<?php echo $form->labelEx($modelCurso,'idProfesor'); ?>
		<?php echo $form->numberField($modelCurso, 'idProfesor'); ?>
		<?php echo $form->error($modelCurso,'idProfesor'); ?>
	</div>


	<input type="number" name="modal" value="1" hidden />



	<div class="row buttons">
		<?php echo CHtml::submitButton($modelCurso->isNewRecord ? 'Listo' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
