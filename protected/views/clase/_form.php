<?php
/* @var $this ClaseController */
/* @var $model Clase */
/* @var $form CActiveForm */


//$themePath = Yii::app()->theme->baseUrl;
//echo '<script src="'.$themePath.'/assets/js/dual-list-box.js" language="javascript" type="text/javascript"></script>';


?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clase-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

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
			'name'=>'Clase[fecha]',
			'id'=>'Clase_fecha',
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
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
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


	<!--
	<script type="text/javascript">
		$('lista').DualListBox();
	</script>
	<select id="lista">
	-->
	<!--
	?php
	$this->widget('ext.DualListBox.DualListBox', array(
		'model'=>$modelAlumno,
		'attribute'=>'nombre',
		'nametitle' => 'Alumno',
		'data' => $listaAlumnos,  // it will be displyed in available side
		'selecteddata'=> $paidAlumnos, // it will be displayed in selected side
		'data_id'=> 'idAlumno',
		'data_value'=> 'nombre',
		'lngOptions' => array(
			'search_placeholder' => 'Buscar Alumno',
			'showing' => ' - Total',
			'available' => 'Disponibles',
			'selected' => 'Seleccionados'
		)
	));
	?>
	-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->