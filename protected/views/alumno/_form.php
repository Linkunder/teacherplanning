<?php
/* @var $this AlumnoController */
/* @var $model Alumno */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumno-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rut'); ?>
		<?php echo $form->textField($model,'rut',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'rut'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido'); ?>
		<?php echo $form->textField($model,'apellido',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mail'); ?>
		<?php echo $form->textField($model,'mail',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'mail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sexo'); ?>
		<!-- ?php echo $form->textField($model,'sexo',array('size'=>15,'maxlength'=>15)); ?> -->

		<?php
		$arraySexo = array("1" => "Hombre", "2" => "Mujer");
		echo $form->dropDownList(
			$model,
			'sexo',
			$arraySexo,
			array('prompt'=>'Seleccione Sexo')
		);
		?>

		<?php echo $form->error($model,'sexo'); ?>
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