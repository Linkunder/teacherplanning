<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	$model->idHorario=>array('view','id'=>$model->idHorario),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Horario', 'url'=>array('index')),
	array('label'=>'Agregar Horario', 'url'=>array('create')),
	array('label'=>'Ver Horarios', 'url'=>array('view', 'id'=>$model->idHorario)),
	array('label'=>'Gestión Horarios', 'url'=>array('admin')),
);
?>

<h1>Actualizar Horario #<?php echo $model->idHorario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,
	'todosLosCursos' => $todosLosCursos,
)); ?>