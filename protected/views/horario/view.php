<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	$model->idHorario,
);

$this->menu=array(
	array('label'=>'Listar Horarios', 'url'=>array('index')),
	array('label'=>'Agregar Horario', 'url'=>array('create')),
	array('label'=>'Actualizar Horario', 'url'=>array('update', 'id'=>$model->idHorario)),
	array('label'=>'Eliminar Horario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idHorario),'confirm'=>'¿Estas seguro de que quieres eliminar este horario?')),
	array('label'=>'Gestion Horarios', 'url'=>array('admin')),
);
?>

<h1>Ver Horario #<?php echo $model->idHorario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idHorario',
		'horaInicio',
		'horaFin',
		'dia',
		'idCurso',
	),
)); ?>
