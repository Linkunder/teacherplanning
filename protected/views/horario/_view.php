<?php
/* @var $this HorarioController */
/* @var $data Horario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idHorario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idHorario), array('view', 'id'=>$data->idHorario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horaInicio')); ?>:</b>
	<?php echo CHtml::encode($data->horaInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horaFin')); ?>:</b>
	<?php echo CHtml::encode($data->horaFin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dia')); ?>:</b>
	<?php echo CHtml::encode($data->dia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCurso')); ?>:</b>
	<?php echo CHtml::encode($data->idCurso); ?>
	<br />


</div>