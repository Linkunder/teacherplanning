<?php
/* @var $this AnotacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Anotaciones',
);

$this->menu=array(
	array('label'=>'Agregar Anotacion', 'url'=>array('create')),
	array('label'=>'Administrar Anotaciones', 'url'=>array('admin')),
);
?>

<h1>Anotaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
