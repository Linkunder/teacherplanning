<?php
/* @var $this HorarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Horarios',
);

$this->menu=array(
	array('label'=>'Listar Horario', 'url'=>array('index')),
	array('label'=>'Agregar Horario', 'url'=>array('create')),
);
?>

<h1>Horarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
