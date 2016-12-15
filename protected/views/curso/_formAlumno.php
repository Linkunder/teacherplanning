<?php
/* @var $this AlumnoController */
/* @var $modelAlumno Alumno */
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
	'action' =>'/teacherplanning/index.php?r=alumno/create',
)); ?>

	<p class="note"><span class="required">*</span> Campos requeridos.</p>

	<?php echo $form->errorSummary($modelAlumno); ?>

	<div class="row">
		<?php echo $form->labelEx($modelAlumno,'rut'); ?>
		<?php echo $form->textField($modelAlumno,'rut',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelAlumno,'rut'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAlumno,'nombre'); ?>
		<?php echo $form->textField($modelAlumno,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelAlumno,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAlumno,'apellido'); ?>
		<?php echo $form->textField($modelAlumno,'apellido',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelAlumno,'apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAlumno,'mail'); ?>
		<?php echo $form->textField($modelAlumno,'mail',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelAlumno,'mail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelAlumno,'sexo'); ?>
		<!-- ?php echo $form->textField($modelAlumno,'sexo',array('size'=>15,'maxlength'=>15)); ?> -->

		<?php
		$arraySexo = array("1" => "Hombre", "2" => "Mujer");
		echo $form->dropDownList(
			$modelAlumno,
			'sexo',
			$arraySexo,
			array('prompt'=>'Seleccione Sexo')
		);
		?>

		<?php echo $form->error($modelAlumno,'sexo'); ?>
	</div>

	<div class="row" hidden>
		<?php echo $form->labelEx($modelAlumno,'idCurso'); ?>
		<?php echo $form->numberField($modelAlumno, 'idCurso'); ?>
		<?php echo $form->error($modelAlumno,'idCurso'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($modelAlumno->isNewRecord ? 'Listo' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->