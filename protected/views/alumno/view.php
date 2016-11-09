<?php
/* @var $this AlumnoController */
/* @var $model Alumno */

$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	$model->idAlumno,
);

$this->menu=array(
	array('label'=>'List Alumno', 'url'=>array('index')),
	array('label'=>'Create Alumno', 'url'=>array('create')),
	array('label'=>'Update Alumno', 'url'=>array('update', 'id'=>$model->idAlumno)),
	array('label'=>'Delete Alumno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idAlumno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alumno', 'url'=>array('admin')),
);
?>

<h1>View Alumno #<?php echo $model->idAlumno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idAlumno',
		'rut',
		'nombre',
		'apellido',
		'mail',
		'sexo',
		'idCurso',
	),
)); ?>
