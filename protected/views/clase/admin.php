<?php
/* @var $this ClaseController */
/* @var $model Clase */

$this->breadcrumbs=array(
	'Clases'=>array('index'),
	'Control',
);

$this->menu=array(
	array('label'=>'Lista de Clases', 'url'=>array('index')),
	array('label'=>'Agregar Clase', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#clase-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Control de Clases</h1>

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
	'id'=>'clase-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idClase',
		'fecha',
		'descripcion',
		'Curso.nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
