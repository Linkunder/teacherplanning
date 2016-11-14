<?php
/* @var $this ProfesorController */
/* @var $model Profesor */

$this->breadcrumbs=array(
	'Profesor'=>array('index'),
	'Agregar',
);

$this->menu=array(
	array('label'=>'Lista de Profesores', 'url'=>array('index')),
	array('label'=>'Control de Profesores', 'url'=>array('admin')),
);
?>

<h1>Agregar Profesor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>