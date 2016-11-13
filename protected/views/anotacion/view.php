<?php
/* @var $this AnotacionController */
/* @var $model Anotacion */

$this->breadcrumbs=array(
	'Anotaciones'=>array('index'),
	$model->idAnotacion,
);

$this->menu=array(
	array('label'=>'List Anotacion', 'url'=>array('index')),
	array('label'=>'Create Anotacion', 'url'=>array('create')),
	array('label'=>'Update Anotacion', 'url'=>array('update', 'id'=>$model->idAnotacion)),
	array('label'=>'Delete Anotacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idAnotacion),'confirm'=>'¿Estas seguro de que quieres eliminar esta anotacion?')),
	array('label'=>'Manage Anotacion', 'url'=>array('admin')),
);
?>

<h1>Ver Anotacion #<?php echo $model->idAnotacion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idAnotacion',
		'nombre',
		'descripcion',
		'Alumno.nombre',
	),
)); ?>
