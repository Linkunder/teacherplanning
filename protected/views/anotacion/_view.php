<?php
/* @var $this AnotacionController */
/* @var $data Anotacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAnotacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idAnotacion), array('view', 'id'=>$data->idAnotacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAlumno')); ?>:</b>
	<?php echo CHtml::encode($data->idAlumno); ?>
	<br />


</div>