<?php
/* @var $this ClaseController */
/* @var $model Clase */

$this->breadcrumbs=array(
	'Clases'=>array('index'),
	$model->fecha=>array('view','id'=>$model->idClase),
	'Editar',
);

$this->menu=array(
	array('label'=>'Lista de Clases Realizadas', 'url'=>array('index')),
	array('label'=>'Agregar Clase', 'url'=>array('create')),
	array('label'=>'Ver esta Clase', 'url'=>array('view', 'id'=>$model->idClase)),
	array('label'=>'Control de Clases', 'url'=>array('admin')),
);
?>

<h1>Editar Clase del día : <?php echo $model->fecha; ?></h1>

<?php
$this->renderPartial('_form', array(
	'model'=>$model,
	'todosLosCursos'=>$todosLosCursos,
	'modelAlumno' => $modelAlumno,
	'listaAlumnos' => $listaAlumnos,
	'paidAlumnos' => $paidAlumnos,
));
?>