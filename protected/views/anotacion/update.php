<?php
/* @var $this AnotacionController */
/* @var $model Anotacion */

$this->breadcrumbs=array(
	'Anotaciones'=>array('index'),
	$model->idAnotacion=>array('view','id'=>$model->idAnotacion),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Anotaciones', 'url'=>array('index')),
	array('label'=>'Agregar Anotación', 'url'=>array('create')),
	array('label'=>'Ver Anotación', 'url'=>array('view', 'id'=>$model->idAnotacion)),
	array('label'=>'Gestionar Anotaciones', 'url'=>array('admin')),
);
?>

<h1>Actualizar Anotación <?php echo $model->idAnotacion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'todosLosAlumnos'=>$todosLosAlumnos)); ?>