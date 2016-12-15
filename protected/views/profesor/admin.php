<?php
/* @var $this ProfesorController */
/* @var $model Profesor */

$this->breadcrumbs=array(
	'Profesores'=>array('index'),

	);

$this->menu=array(
	array('label'=>'List Profesor', 'url'=>array('index')),
	array('label'=>'Create Profesor', 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$('#profesor-grid').yiiGridView('update', {
			data: $(this).serialize()
		});
		return false;
	});
	");
	?>

	<h1>Profesores</h1>

	<p>
		Opcionalmente puedes ingresar un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
		or <b>=</b>) al inicio de cada uno de los valores de busqueda para especificar que comparación debe hacerse.
	</p>

	<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
	<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
			)); ?>
		</div><!-- search-form -->

		<?php 


		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'profesor-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'nombre',
				'apellido',
				'rut',
				'mail',
				array(
					'header'=>'Cursos',
					'name'=>'idProfesor',
					'value'=>function($data, $row) use (&$model){
						$result = count((Array)(Curso::model()->findAllByAttributes(array('idProfesor' => $data->idProfesor,))));
						return ''.$result;
					},



					),
				array(
					'header'=>'Plan',
					'name'=>'idProfesor',
					'value'=>function($data, $row) use (&$model){

						$profesor = $data->itsfree;
						if($profesor == 1 ){
							return "De pago";
						}else{
							return "Gratis";
						}


					},



					),

		/*
		'perfil',
		
		array(
			'class'=>'CButtonColumn',
		),
		*/


		),
		)); ?>
