<?php
/* @var $this ClaseController */
/* @var $model Clase */

$this->breadcrumbs=array(
	'Clases'=>array('index'),
	$model->fecha,
);

$this->menu=array(
	array('label'=>'Lista de Clases Realizadas', 'url'=>array('index')),
	array('label'=>'Agregar Clase', 'url'=>array('create')),
	array('label'=>'Editar Clase', 'url'=>array('update', 'id'=>$model->idClase)),
	array('label'=>'Eliminar Clase', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idClase),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Control de Clases', 'url'=>array('admin')),
);
?>

<h1>Clase del día : <?php echo $model->fecha; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idClase',
		'fecha',
		'descripcion',
		'Curso.nombre',
	),
)); ?>
