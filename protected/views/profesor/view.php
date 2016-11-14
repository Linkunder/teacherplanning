<?php
/* @var $this ProfesorController */
/* @var $model Profesor */

$this->breadcrumbs=array(
	'Profesor'=>array('index'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>'Lista de Profesores', 'url'=>array('index')),
	array('label'=>'Agregar Profesor', 'url'=>array('create')),
	array('label'=>'Editar Profesor', 'url'=>array('update', 'id'=>$model->idProfesor)),
	array('label'=>'Eliminar Profesor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idProfesor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Control de Profesores', 'url'=>array('admin')),
);
?>

<h1>Profesor : <?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idProfesor',
		'nombre',
		'apellido',
		'rut',
		'mail',
		'password',
	),
)); ?>
