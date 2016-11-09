<?php
/* @var $this ProfesorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Profesors',
);

$this->menu=array(
	array('label'=>'Create Profesor', 'url'=>array('create')),
	array('label'=>'Manage Profesor', 'url'=>array('admin')),
);
?>

<h1>Profesors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
