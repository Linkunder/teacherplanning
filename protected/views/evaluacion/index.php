<?php
/* @var $this EvaluacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Evaluacions',
);

$this->menu=array(
	array('label'=>'Crear Evaluacion', 'url'=>array('create')),
	array('label'=>'Gestionar Evaluaciones', 'url'=>array('admin')),
);
?>

<h1>Evaluaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
