<?php
/* @var $this EvaluacionController */
/* @var $data Evaluacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEvaluacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEvaluacion), array('view', 'id'=>$data->idEvaluacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ponderacion')); ?>:</b>
	<?php echo CHtml::encode($data->ponderacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCurso')); ?>:</b>
	<?php echo CHtml::encode($data->Curso->nombre); ?>
	<br />


</div>