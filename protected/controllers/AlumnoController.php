<?php

class AlumnoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow authenticated users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
				),
            /*
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
				),*/
			array('allow', // allow profesors user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','delete'),
				'users'=>array('profesor'),
				),
            array('allow', // allow profesors user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'users'=>array('super'),
            ),
			array('deny',  // deny all users
				'users'=>array('*'),
				),
			);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Alumno;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Alumno']))
		{
			$model->attributes=$_POST['Alumno'];



			if($model->save()){
				$idAlumno =  $model->idAlumno;
				$idCurso = $model->idCurso;
				$evaluacionesCurso = Evaluacion::model()->findAllByAttributes(array('idCurso' => $idCurso, ));
				if (!empty($evaluacionesCurso)){
					foreach ($evaluacionesCurso as $eval) {
						$model2 = new Alumnorindeevaluacion;
						$notaAlumno = 1;
						$model2->idAlumno = $idAlumno;
						$model2->idEvaluacion = $eval->idEvaluacion;
						$model2->nota = $notaAlumno;
						$model2->save();
					}
				}
				header('Location:?r=curso/cursos&modal=7');
			} else {
				header('Location:?r=curso/cursos&modal=8');
			}
		}

		// *** se debe listar solo los cursos que posee ese profesor el cual esta creando el curso y logeado
		$todosLosCursos = Curso::model()->findAll();

		$this->render('create',array(
			'model'=> $model,
			'todosLosCursos' => $todosLosCursos,
			));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Alumno']))
		{
			$model->attributes=$_POST['Alumno'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idAlumno));
		}

        // *** se debe listar solo los cursos que posee ese profesor el cual esta creando el curso y logeado
		$todosLosCursos = Curso::model()->findAll();

		$this->render('update',array(
			'model'=>$model,
			'todosLosCursos' => $todosLosCursos,
			));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$user= Yii::app()->user;

		$dataProvider=new CActiveDataProvider('Alumno');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'user' => $user,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Alumno('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Alumno']))
			$model->attributes=$_GET['Alumno'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Alumno the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Alumno::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Alumno $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='alumno-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
