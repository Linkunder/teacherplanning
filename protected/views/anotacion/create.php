<?php
/* @var $this AnotacionController */
/* @var $model Anotacion */

$this->breadcrumbs=array(
	'Anotaciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Agregar Anotacion', 'url'=>array('create')),
	array('label'=>'Administrar Anotaciones', 'url'=>array('admin')),
);
?>

<h1>Agregar Anotacion</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'todosLosAlumnos'=>$todosLosAlumnos,)); ?>