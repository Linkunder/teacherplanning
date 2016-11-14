<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluacions'=>array('index'),
	$model->idEvaluacion,
);

$this->menu=array(
	array('label'=>'List Evaluacion', 'url'=>array('index')),
	array('label'=>'Create Evaluacion', 'url'=>array('create')),
	array('label'=>'Update Evaluacion', 'url'=>array('update', 'id'=>$model->idEvaluacion)),
	array('label'=>'Delete Evaluacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEvaluacion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Evaluacion', 'url'=>array('admin')),
);
?>

<h1>View Evaluacion #<?php echo $model->idEvaluacion; ?></h1>

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
