<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>'Lista de Cursos', 'url'=>array('index')),
	array('label'=>'Crear Curso', 'url'=>array('create')),
	array('label'=>'Editar Curso', 'url'=>array('update', 'id'=>$model->idCurso)),
	array('label'=>'Eliminar Curso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCurso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Control de Cursos', 'url'=>array('admin')),
);
?>

<h1>Curso : <?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCurso',
		'nombre',
		'institucion',
		'idProfesor',
	),
)); ?>
