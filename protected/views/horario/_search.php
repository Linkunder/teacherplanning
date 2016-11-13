<?php
/* @var $this HorarioController */
/* @var $model Horario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idHorario'); ?>
		<?php echo $form->textField($model,'idHorario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horaInicio'); ?>
		<?php echo $form->textField($model,'horaInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horaFin'); ?>
		<?php echo $form->textField($model,'horaFin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dia'); ?>
		<?php echo $form->textField($model,'dia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCurso'); ?>
		<?php echo $form->textField($model,'idCurso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->