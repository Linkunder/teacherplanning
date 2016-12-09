<?php
$cs = Yii::app()->clientScript;
$themePath = Yii::app()->theme->baseUrl;

/**
 * StyleSHeets

<link href="assets/css/responsive.dataTables.min.css" rel="stylesheet">
 <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.responsive.min.js"></script>

calendario
    ->registerCssFile($themePath.'/assets/css/fullcalendar.css')
    ->registerCssFile($themePath.'/assets/css/fullcalendar.min.css')
    ->registerCssFile($themePath.'/assets/css/fullcalendar.print.css')
 */
$cs
    ->registerCssFile($themePath.'/assets/css/bootstrap.css')
    ->registerCssFile($themePath.'/assets/css/bootstrap-theme.css')
    ->registerCssFile($themePath.'/assets/css/responsive.dataTables.min.css')
    ->registerCssFile($themePath.'/assets/css/dataTables.bootstrap.min.css');
/**
 * JavaScripts
	calendario
 	->registerScriptFile($themePath.'/assets/js/fullcalendar.js',CClientScript::POS_END)
	->registerScriptFile($themePath.'/assets/js/fullcalendar.min.js',CClientScript::POS_END)
	->registerScriptFile($themePath.'/assets/js/moment.min.js',CClientScript::POS_END)
	->registerScriptFile($themePath.'/assets/js/es.js',CClientScript::POS_END)
 */
$cs
    ->registerCoreScript('jquery',CClientScript::POS_END)
    ->registerCoreScript('jquery.ui',CClientScript::POS_END)
    ->registerScriptFile($themePath.'/assets/js/bootstrap.min.js',CClientScript::POS_END)
	->registerScriptFile($themePath.'/assets/js/jquery.dataTables.min.js',CClientScript::POS_END)
	->registerScriptFile($themePath.'/assets/js/dataTables.responsive.min.js',CClientScript::POS_END)
	->registerScriptFile($themePath.'/assets/js/dataTables.responsive.min.js',CClientScript::POS_END)
	->registerScriptFile($themePath.'/assets/js/dual-list-box.js',CClientScript::POS_END)





    ->registerScript('tooltip',
        "$('[data-toggle=\"tooltip\"]').tooltip();
        $('[data-toggle=\"popover\"]').tooltip()"
        ,CClientScript::POS_READY);

?>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/html5shiv.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/respond.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/dual-list-box.js"></script>
<![endif]-->
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">


	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
		<?php 
		if(Yii::app()->user->isGuest == false){ 
        ?>
	<nav class="navbar navbar-inverse navbar-static-top">
			<div class="container">
				<div class="navbar-header">
        <button type="button" class="btn navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo Yii::app()->homeUrl; ?>">
					<?php echo Yii::app()->name;?>
				</a>
				</div>
				<div id="navbar3" class="navbar-collapse collapse">
	
		<?php /* $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Acerca de', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contacto', 'url'=>array('/site/contact')),
				array('label'=>'Cursos', 'url'=>array('/curso')),
				array('label'=>'Horario', 'url'=>array('/horario')),
				array('label'=>'Alumnos', 'url'=>array('/alumno')),
				array('label'=>'Anotación', 'url'=>array('/anotacion')),
				array('label'=>'Profesor', 'url'=>array('/profesor')),
				array('label'=>'Clase', 'url'=>array('/clase')),
				array('label'=>'Evaluacion', 'url'=>array('/evaluacion')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
			'htmlOptions' => array('class' => 'nav navbar-nav navbar-right'),
		)); */?>
		<ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo Yii::app()->homeUrl; ?>">Inicio</a></li>
              <?php
              if(Yii::app()->user->getState('usuario')->perfil==0){
              ?>
              <li ><?php echo CHtml::link('Cursos',array('/curso/cursos'),array('class'=>'btn_registro')); ?></li>

              <li><?php echo CHtml::link('Evaluaciones',array('evaluacion/notas'),array('class'=>'btn_registro')); ?></li>
              <li><?php echo CHtml::link('Anotaciones',array('/anotacion/prueba'),array('class'=>'btn_registro')); ?></li>
              <li><?php echo CHtml::link('Calendario',array('/calendario/calendarios'),array('class'=>'btn_registro')); ?></li>
              
              <?php 
          }
              if(Yii::app()->user->getState('usuario')->perfil==1){
              	?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CRUDS<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><?php echo CHtml::link('Curso',array('/curso'),array('class'=>'btn_registro')); ?></li>
                  <li><?php echo CHtml::link('Horario',array('/horario'),array('class'=>'btn_registro')); ?></li>
                  <li><?php echo CHtml::link('Alumno',array('/alumno'),array('class'=>'btn_registro')); ?></li>
                  <li><?php echo CHtml::link('Anotación',array('/anotacion'),array('class'=>'btn_registro')); ?></li>
                  <li><?php echo CHtml::link('Profesor',array('/profesor'),array('class'=>'btn_registro')); ?></li>
                  <li><?php echo CHtml::link('Clase',array('/clase'),array('class'=>'btn_registro')); ?></li>
                  <li><?php echo CHtml::link('Evaluación',array('/evaluacion'),array('class'=>'btn_registro')); ?></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Especiales</li>
                  <li><?php //echo CHtml::link('Asistencia',array('/asistencia'),array('class'=>'btn_registro')); ?></li>
                  <li><?php //echo CHtml::link('Notas',array('/notas'),array('class'=>'btn_registro')); ?></li>
                </ul>
              </li>
              <?php 
		          } 
		        ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li>
              	<a>
              	<?php
              		if(Yii::app()->user->getState('usuario')!=null){
              			echo Yii::app()->user->getState('usuario')->nombre;
              		}
              	?>
              	</a>
              </li>
              <li><?php echo CHtml::link('Salir',array('/site/logout'),array('class'=>'btn_registro')); ?></li>
            </ul>
			</div>
		</div>
	</nav>

<?php } ?>

	<!-- mainmenu -->
	<div class="container">
	<div class="page-header">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	</div> <!-- fin page header -->

	<?php echo $content; ?>

	<div class="clear"></div>

	<div class="footer text-center">
		Copyright &copy; <?php echo date('Y'); ?> by ICI.<br/>
		Todos los derechos reservados.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->
	</div> <!-- fin container despues de mainmenu -->


</body>
</html>
