<?php
$cs = Yii::app()->clientScript;
$themePath = Yii::app()->theme->baseUrl;

/**
 * StyleSHeets
 */
$cs
    ->registerCssFile($themePath.'/assets/css/bootstrap.css')
    ->registerCssFile($themePath.'/assets/css/bootstrap-theme.css');

/**
 * JavaScripts
 */
$cs
    ->registerCoreScript('jquery',CClientScript::POS_END)
    ->registerCoreScript('jquery.ui',CClientScript::POS_END)
    ->registerScriptFile($themePath.'/assets/js/bootstrap.min.js',CClientScript::POS_END)

    ->registerScript('tooltip',
        "$('[data-toggle=\"tooltip\"]').tooltip();
        $('[data-toggle=\"popover\"]').tooltip()"
        ,CClientScript::POS_READY);

?>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/html5shiv.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/respond.min.js"></script>
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

	<nav class="navbar navbar-inverse navbar-static-top">
			<div class="container">
				<div class="navbar-header">
        <button type="button" class="btn navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
					<span class="sr-only">Toogle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo Yii::app()->homeUrl; ?>">
					<?php echo Yii::app()->name;?>
				</a>
				</div>
				<div id="navbar3" class="navbar-collapse collapse">

		<?php $this->widget('zii.widgets.CMenu',array(
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
		)); ?>
			</div>
		</div>
	</nav><!-- mainmenu -->
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
