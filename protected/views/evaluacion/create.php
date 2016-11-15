<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluaciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Evaluacion', 'url'=>array('index')),
	array('label'=>'Manage Evaluacion', 'url'=>array('admin')),
);
?>

<h1>Agregar Evaluación</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'todosLosCursos'=>$todosLosCursos)); ?>