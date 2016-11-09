<?php
/* @var $this CursoController */
/* @var $data Curso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCurso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCurso), array('view', 'id'=>$data->idCurso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institucion')); ?>:</b>
	<?php echo CHtml::encode($data->institucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProfesor')); ?>:</b>
	<?php echo CHtml::encode($data->idProfesor); ?>
	<br />


</div>