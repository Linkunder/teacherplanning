<?php

class ReporteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('reportes'),
				'users'=>array('profesor'),
				),
			array('deny',  // deny all users
				'users'=>array('*'),
				),
			);
	}
	public function actionReportes()
	{
		/*
		$model=new Profesor('search');
		$model->unsetAttributes();  
		if(isset($_GET['Profesor']))
			$model->attributes=$_GET['Profesor'];

		//Se filtra para que el administrador solo pueda ver profesores y no asi mismo
		$model->perfil = 0;
		*/
		$this->render('reportes');
	}







}