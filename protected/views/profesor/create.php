<?php
/* @var $this ProfesorController */
/* @var $model Profesor */

$this->breadcrumbs=array(
	'Profesors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Profesor', 'url'=>array('index')),
	array('label'=>'Manage Profesor', 'url'=>array('admin')),
);
?>

<h1>Create Profesor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>