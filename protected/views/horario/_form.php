<?php
/* @var $this HorarioController */
/* @var $model Horario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'horario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'horaInicio'); ?>
		<?php echo $form->textField($model,'horaInicio'); ?>
		<?php echo $form->error($model,'horaInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horaFin'); ?>
		<?php echo $form->textField($model,'horaFin'); ?>
		<?php echo $form->error($model,'horaFin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCurso'); ?>
		<!-- ?php echo $form->textField($model,'idCurso'); ?> -->
		<!-- listData($ARREGLO, 'ID_A_SELECCIONAR','NOMBRE_EN_BASE_A_ID','GRUPO_EN_BASE_A_ALGUN_ATRIBUTO') -->
		<?php $lista = CHtml::listData($todosLosCursos, 'idCurso','nombre','institucion') ?>
		<?php echo $form->dropDownList(
			$model,
			'idCurso',
			$lista,
			array('prompt'=>'Seleccione Curso')
		); ?>
		<?php echo $form->error($model,'idCurso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->