<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	'Control',
);

$this->menu=array(
	array('label'=>'Lista de Cursos', 'url'=>array('index')),
	array('label'=>'Crear Curso', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#curso-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Control de Cursos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'curso-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idCurso',
		'nombre',
		'institucion',
		'idProfesor',
		array(
			'class'=>'CButtonColumn',
			'template' => '{view} {update} {delete} {lista}',
			'buttons'=>array(
				'lista' => array(
					'label'=>'Lista de Asistencia', // text label of the button
					'url'=>'Yii::app()->createUrl("lista_asistencia", array("id"=>'.$model->idCurso.'))',
				),
			),

		),
	),
)); ?>
