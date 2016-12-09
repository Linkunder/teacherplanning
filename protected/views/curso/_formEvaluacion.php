<?php
/* @var $this EvaluacionController */
/* @var $modelEvaluacion Evaluacion */
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
	'action' =>'/teacherplanning/index.php?r=evaluacion/create',
)); ?>



	<?php echo $form->errorSummary($modelEvaluacion); ?>

	<div class="row">
		<?php echo $form->labelEx($modelEvaluacion,'nombre'); ?>
		<?php echo $form->textField($modelEvaluacion,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($modelEvaluacion,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelEvaluacion,'descripcion'); ?>
		<?php echo $form->textArea($modelEvaluacion,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($modelEvaluacion,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelEvaluacion,'ponderacion'); ?>
		<?php echo $form->textField($modelEvaluacion,'ponderacion'); ?>
		<?php echo $form->error($modelEvaluacion,'ponderacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelEvaluacion,'fecha'); ?>

		<?php 
		//echo $form->textField($modelEvaluacion,'fecha'); 

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
			'value'=>Yii::app()->dateFormatter->format("y-M-d",strtotime($modelEvaluacion->fecha)),
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

		<?php echo $form->error($modelEvaluacion,'fecha'); ?>
	</div>

	<!-- class="row">
		<?php //echo $form->labelEx($modelEvaluacion,'idCurso'); ?>
				<?php 
		//echo $form->textField($modelEvaluacion,'idCurso'); 
		//$lista = CHtml::listData($todosLosCursos, 'idCurso','nombre','institucion');
		//echo $form->dropDownList($modelEvaluacion,'idCurso',$lista,array('prompt'=>'Seleccione un curso'));

		?>
		<?php // echo $form->error($modelEvaluacion,'idCurso'); ?>
	</div-->

	<div class="row" hidden>
		<?php echo $form->labelEx($modelEvaluacion,'idCurso'); ?>
		<?php echo $form->numberField($modelEvaluacion, 'idCurso'); ?>
		<?php echo $form->error($modelEvaluacion,'idCurso'); ?>
	</div>


	<input type="number" name="modal" value="1" hidden />
	<div class="row buttons">
		<?php echo CHtml::submitButton($modelEvaluacion->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->