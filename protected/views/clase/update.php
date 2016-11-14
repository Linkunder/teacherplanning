<?php
/* @var $this ClaseController */
/* @var $model Clase */

$this->breadcrumbs=array(
	'Clases'=>array('index'),
	$model->idClase=>array('view','id'=>$model->idClase),
	'Update',
);

$this->menu=array(
	array('label'=>'List Clase', 'url'=>array('index')),
	array('label'=>'Create Clase', 'url'=>array('create')),
	array('label'=>'View Clase', 'url'=>array('view', 'id'=>$model->idClase)),
	array('label'=>'Manage Clase', 'url'=>array('admin')),
);
?>

<h1>Update Clase <?php echo $model->idClase; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'todosLosCursos'=>$todosLosCursos)); ?>