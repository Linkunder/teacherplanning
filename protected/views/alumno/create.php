<?php
/* @var $this AlumnoController */
/* @var $model Alumno */

$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista Alumnos', 'url'=>array('index')),
	array('label'=>'Control de Alumnos', 'url'=>array('admin')),
);
?>

<h1>Agregar nuevo Alumno</h1>

<?php
$this->renderPartial('_form', array(
	'model'=>$model,
	'todosLosCursos' => $todosLosCursos,
));
?>