<?php
/* @var $this AlumnoController */
/* @var $model Alumno */

$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	$model->nombre=>array('view','id'=>$model->idAlumno),
	'Editar',
);

$this->menu=array(
	array('label'=>'Lista de Alumnos', 'url'=>array('index')),
	array('label'=>'Agregar Alumno', 'url'=>array('create')),
	array('label'=>'Ver a este Alumno', 'url'=>array('view', 'id'=>$model->idAlumno)),
	array('label'=>'Control de Alumnos', 'url'=>array('admin')),
);
?>

<h1>Editar Alumno : <?php echo $model->nombre." ".$model->apellido; ?></h1>

<?php
$this->renderPartial('_form', array(
	'model'=>$model,
	'todosLosCursos' => $todosLosCursos,
));
?>