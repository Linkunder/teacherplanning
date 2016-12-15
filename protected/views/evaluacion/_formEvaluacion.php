<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'evaluacion-form',
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
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ponderacion'); ?>
		<?php echo $form->textField($model,'ponderacion'); ?>
		<?php echo $form->error($model,'ponderacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>

		<?php 
		//echo $form->textField($model,'fecha'); 

		?>
		<script>
		$(function() {    
			$( "#anim" ).change(function() {
				$( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
			});
		});
		</script>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'Evaluacion[fecha]',
			'id'=>'Evaluacion_fecha',
			'value'=>Yii::app()->dateFormatter->format("y-M-d",strtotime($model->fecha)),
			// additional javascript options for the date picker plugin
			'options'=>array(
				'dateFormat'=>'yy-mm-dd',
				'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
			),
			'htmlOptions'=>array(
				'style'=>'height:30px;background-color:white;color:black;',
				),
			));
		?>

		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCurso'); ?>
				<?php 
		//echo $form->textField($model,'idCurso'); 
		$lista = CHtml::listData($todosLosCursos, 'idCurso','nombre','institucion');
		echo $form->dropDownList($model,'idCurso',$lista,array('prompt'=>'Seleccione un curso'));

		?>
		<?php echo $form->error($model,'idCurso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Listo' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->