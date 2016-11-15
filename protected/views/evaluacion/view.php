<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluaciones'=>array('index'),
	$model->idEvaluacion,
);

$this->menu=array(
	array('label'=>'Listar Evaluaciones', 'url'=>array('index')),
	array('label'=>'Crear Evaluación', 'url'=>array('create')),
	array('label'=>'Actualizar Evaluación', 'url'=>array('update', 'id'=>$model->idEvaluacion)),
	array('label'=>'Eliminar Evaluaciónn', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEvaluacion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Evaluaciones', 'url'=>array('admin')),
);
?>

<h1>Ver Evaluación #<?php echo $model->idEvaluacion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEvaluacion',
		'nombre',
		'descripcion',
		'ponderacion',
		'fecha',
		'Curso.nombre',
	),
)); ?>
