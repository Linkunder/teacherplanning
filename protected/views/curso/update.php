<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->nombre=>array('view','id'=>$model->idCurso),
	'Editar',
);

$this->menu=array(
	array('label'=>'Lista de Cursos', 'url'=>array('index')),
	array('label'=>'Crear Curso', 'url'=>array('create')),
	array('label'=>'Ver Curso', 'url'=>array('view', 'id'=>$model->idCurso)),
	array('label'=>'Control de Cursos', 'url'=>array('admin')),
);
?>

<h1>Editar Curso : <?php echo $model->nombre; ?></h1>

<?php
$this->renderPartial('_form', array(
	'model'=>$model,
	'todosLosProfesores' => $todosLosProfesores,
));
?>