<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	'Agregar',
);

$this->menu=array(
	array('label'=>'Listar Horario', 'url'=>array('index')),
	array('label'=>'Agregar Horario', 'url'=>array('create')),
);
?>

<h1>Agregar Horario</h1>

<?php $this->renderPartial('_form', array('model'=>$model,
	'todosLosCursos' => $todosLosCursos,
)); ?>