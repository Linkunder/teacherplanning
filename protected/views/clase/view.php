<?php
/* @var $this ClaseController */
/* @var $model Clase */

$this->breadcrumbs=array(
	'Clases'=>array('index'),
	$model->idClase,
);

$this->menu=array(
	array('label'=>'List Clase', 'url'=>array('index')),
	array('label'=>'Create Clase', 'url'=>array('create')),
	array('label'=>'Update Clase', 'url'=>array('update', 'id'=>$model->idClase)),
	array('label'=>'Delete Clase', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idClase),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Clase', 'url'=>array('admin')),
);
?>

<h1>View Clase #<?php echo $model->idClase; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idClase',
		'fecha',
		'descripcion',
		'Curso.nombre',
	),
)); ?>
