<?php
/* @var $this ProfesorController */
/* @var $model Profesor */

$this->breadcrumbs=array(
	'Profesor'=>array('index'),
	$model->nombre=>array('view','id'=>$model->idProfesor),
	'Editar',
);

$this->menu=array(
	array('label'=>'Lista de Profesores', 'url'=>array('index')),
	array('label'=>'Agregar Profesor', 'url'=>array('create')),
	array('label'=>'Ver a este Profesor', 'url'=>array('view', 'id'=>$model->idProfesor)),
	array('label'=>'Control de Profesores', 'url'=>array('admin')),
);
?>

<h1>Editar Profesor : <?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>