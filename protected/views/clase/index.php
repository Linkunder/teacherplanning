<?php
/* @var $this ClaseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clases',
);

$this->menu=array(
	array('label'=>'Agregar Clase', 'url'=>array('create')),
	array('label'=>'Control de Clases', 'url'=>array('admin')),
);
?>

<h1>Clases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
