<?php
/* @var $this AlumnoController */
/* @var $model Alumno */

$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>'Lista de Alumnos', 'url'=>array('index')),
	array('label'=>'Agregar Alumno', 'url'=>array('create')),
	array('label'=>'Editar Alumno', 'url'=>array('update', 'id'=>$model->idAlumno)),
	array('label'=>'Eliminar Alumno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idAlumno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Control de Alumnos', 'url'=>array('admin')),
);
?>

<h1>Alumno : <?php echo $model->nombre." ".$model->apellido; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idAlumno',
		'rut',
		'nombre',
		'apellido',
		'mail',
		'sexo',
		'idCurso',
	),
)); ?>
