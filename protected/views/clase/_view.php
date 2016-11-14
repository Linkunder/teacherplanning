<?php
/* @var $this ClaseController */
/* @var $data Clase */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idClase')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idClase), array('view', 'id'=>$data->idClase)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCurso')); ?>:</b>
	<?php echo CHtml::encode($data->Curso->nombre); ?>
	<br />


</div>