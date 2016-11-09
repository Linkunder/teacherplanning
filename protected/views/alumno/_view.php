<?php
/* @var $this AlumnoController */
/* @var $data Alumno */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAlumno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idAlumno), array('view', 'id'=>$data->idAlumno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut')); ?>:</b>
	<?php echo CHtml::encode($data->rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido')); ?>:</b>
	<?php echo CHtml::encode($data->apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mail')); ?>:</b>
	<?php echo CHtml::encode($data->mail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo')); ?>:</b>
	<?php echo CHtml::encode($data->sexo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCurso')); ?>:</b>
	<?php echo CHtml::encode($data->idCurso); ?>
	<br />


</div>