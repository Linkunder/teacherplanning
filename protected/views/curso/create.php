<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista de Cursos', 'url'=>array('index')),
	array('label'=>'Control de Cursos', 'url'=>array('admin')),
);
?>

<h1>Crear Curso</h1>

<?php
$this->renderPartial('_form', array(
	'model'=>$model,
	'todosLosProfesores' => $todosLosProfesores,
));
?>