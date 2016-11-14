<?php
/* @var $this ClaseController */
/* @var $model Clase */

$this->breadcrumbs=array(
	'Clases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Clase', 'url'=>array('index')),
	array('label'=>'Manage Clase', 'url'=>array('admin')),
);
?>

<h1>Agregar nueva clase</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'todosLosCursos'=>$todosLosCursos)); ?>