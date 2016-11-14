<?php
/* @var $this ClaseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clases',
);

$this->menu=array(
	array('label'=>'Create Clase', 'url'=>array('create')),
	array('label'=>'Manage Clase', 'url'=>array('admin')),
);
?>

<h1>Clases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
