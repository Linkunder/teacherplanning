<?php
/* @var $this ProfesorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Profesor',
);

$this->menu=array(
	array('label'=>'Agregar Profesor', 'url'=>array('create')),
	array('label'=>'Control de Profesores', 'url'=>array('admin')),
);
?>

<h1>Profesores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
