<?php
/* @var $this ClaseController */
/* @var $model Clase */
/* @var $form CActiveForm */


//$themePath = Yii::app()->theme->baseUrl;
//echo '<script src="'.$themePath.'/assets/js/dual-list-box.js" language="javascript" type="text/javascript"></script>';


?>

<link href="<?php echo Yii::app()->request->baseUrl;?>/themes/kongoon/assets/css/bootstrap-duallistbox.css" rel="stylesheet" />
<script src='<?php echo Yii::app()->request->baseUrl;?>/themes/kongoon/assets/js/jquery.bootstrap-duallistbox.js'></script>
<script src='<?php echo Yii::app()->request->baseUrl;?>/themes/kongoon/assets/js/bootstrap.js'></script>


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


	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<select id="listaAlumnos" name="listaAsistencia[]" multiple="multiple" size="<?= count($listaAlumnos)?>">

					<?php
					foreach($listaAlumnos[0] as $alumno){
						?>
						<option id="no-en-lista" value="<?= $alumno->idAlumno ?>">
							<?php echo $alumno->nombre." ".$alumno->apellido ?>
						</option>
						<?php
					}

					foreach ($listaAsistencia as $asistio) {
						?>
						<option id="en-lista" value="<?= $asistio->idAlumno ?>" disabled selected="selected"> <!-- Estos se van a la segunda lista -->
							<?php echo $asistio->nombre." ".$asistio->apellido ?>
						</option>
						<?php
					}
					?>

				</select>
			</div>
		</div>
	</div>
	<script>
		var demo1 = $('select[name="listaAsistencia[]"]').bootstrapDualListbox({
			nonSelectedListLabel: 'No seleccionados',
			selectedListLabel: 'Seleccionados',
			preserveSelectionOnMove: 'moved',
			moveOnSelect: true,
		}); // se inicializa en base al name
	</script>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->





<?php
/*
echo '<pre>';
echo print_r($listaAlumnos);
echo '</pre>';
*/
?>