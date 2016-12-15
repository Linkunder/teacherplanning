<?php
/* @var $this AnotacionController */
/* @var $model Anotacion */

$this->breadcrumbs=array(
	'Anotaciones'=>array('index'),
	'Gestion',
);
/*
$this->menu=array(
	array('label'=>'Agregar Anotacion', 'url'=>array('create')),
	array('label'=>'Gestionar Anotaciones', 'url'=>array('admin')),
	array('label'=>'Prueba', 'url'=>array('prueba')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#anotacion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Control Anotaciones</h1>

<p>
	Opcionalmente puedes ingresar un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
	or <b>=</b>) al inicio de cada uno de los valores de busqueda para especificar que comparación debe hacerse.
</p>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'anotacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idAnotacion',
		'nombre',
		'descripcion',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
