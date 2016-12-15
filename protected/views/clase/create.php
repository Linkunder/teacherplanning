<?php
/* @var $this ClaseController */
/* @var $model Clase */

$this->breadcrumbs=array(
	'Clases'=>array('index'),
	'Crear',
);
/*
$this->menu=array(
	array('label'=>'Lista de Clases Realizadas', 'url'=>array('index')),
	array('label'=>'Control de Clases', 'url'=>array('admin')),
);
*/
?>

<h1>Agregar Nueva Clase</h1>

<?php
$this->renderPartial('_form', array(
	'model'=>$model,
	'todosLosCursos'=>$todosLosCursos,
	'listaAlumnos' => $listaAlumnos,
    'listaAsistencia' => $listaAsistencia,
	'idCurso' => $idCurso,
));
?>