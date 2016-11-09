<?php
/* @var $this ProfesorController */
/* @var $model Profesor */

$this->breadcrumbs=array(
	'Profesors'=>array('index'),
	$model->idProfesor=>array('view','id'=>$model->idProfesor),
	'Update',
);

$this->menu=array(
	array('label'=>'List Profesor', 'url'=>array('index')),
	array('label'=>'Create Profesor', 'url'=>array('create')),
	array('label'=>'View Profesor', 'url'=>array('view', 'id'=>$model->idProfesor)),
	array('label'=>'Manage Profesor', 'url'=>array('admin')),
);
?>

<h1>Update Profesor <?php echo $model->idProfesor; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>