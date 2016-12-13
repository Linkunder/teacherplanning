<?php

class EvaluacionController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
				),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
				),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
				),
			array('allow', 
				'actions'=>array('notas','notas'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('_notas','partialEvaluaciones'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('_notas','partialEvaluar'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('_notas','partialAgregarNotas'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('_notas','registrarNotas'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('calificar','calificar'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('calificar','SetCalificaciones'),
				'users'=>array('*'),
				),
			array('deny',  // deny all users
				'users'=>array('*'),
				),
			);
	}


	public function actionNotas(){
		$model=new Curso;
		$todosLosCursos = Curso::model()->findAll();
		//$todasLasEvaluaciones = Evaluacion::model()->findAll();

		$this->render('notas',array(
			'model'=>$model,
			'todosLosCursos' => $todosLosCursos,
			));
	}

	public function actionPartialEvaluaciones(){
		$idCurso = $_GET['idCurso'];
		$evaluacionesCurso = Evaluacion::model()->findAllByAttributes(array('idCurso' => $idCurso, ));
		$notasCurso = array();
		foreach ($evaluacionesCurso as $key ) {
			$idEvaluacion = $key->idEvaluacion;
			// Traer notas por EVALUACIÓN. 
			$notasCurso[$idEvaluacion] = AlumnoRindeEvaluacion::model()->findAllByAttributes(array('idEvaluacion' => $idEvaluacion, ));
		}
		$this->renderPartial('_notasParciales', array('evaluacionesCurso'=>$evaluacionesCurso,'notasCurso'=>$notasCurso ));
	}


	public function actionpartialEvaluar(){
		$idCurso = $_GET['idCurso'];
		$evaluacionesCurso = Evaluacion::model()->findAllByAttributes(array('idCurso' => $idCurso, ));
		$this->renderPartial('_evaluacionesCurso', array('evaluacionesCurso'=>$evaluacionesCurso,));
	}

	public function actionpartialAgregarNotas(){
		$idEvaluacion = $_GET['idEvaluacion'];
		$evaluacion = Evaluacion::model()->findAllByAttributes(array('idEvaluacion' => $idEvaluacion, ));
		$idCurso = end($evaluacion)->idCurso;
		$alumnosCurso = Alumno::model()->findAllByAttributes(array('idCurso' => $idCurso, ));
		$this->renderPartial('_agregarNotas', array('evaluacion'=>$evaluacion,'alumnosCurso'=>$alumnosCurso  ));
	}

	public function actionregistrarNotas(){
		$idEvaluacion = $_POST['idEvaluacion'];
		$evaluacion = Evaluacion::model()->findAllByAttributes(array('idEvaluacion' => $idEvaluacion, ));
		$idCurso = end($evaluacion)->idCurso;
		$alumnosCurso = Alumno::model()->findAllByAttributes(array('idCurso' => $idCurso, ));
		foreach ($alumnosCurso as $key) {
			$model = new Alumnorindeevaluacion;
			$notaAlumno = $_POST['notaAlumno'.$key->idAlumno];
			$idAlumno = $key->idAlumno;

			$model->idAlumno = $idAlumno;
			$model->idEvaluacion = $idEvaluacion;
			$model->nota = $notaAlumno;
			$model->save();
		}
		header('Location:?r=curso/cursos');		
	}















	public function actionCalificar(){
		//$model = new Alumnorindeevaluacion;
		
		$idEvaluacion = $_POST['evaluacion'];
		$notasAlumno = Alumnorindeevaluacion::model()->findAllByAttributes(array('idEvaluacion' => $idEvaluacion, ));
		$idCurso = $_POST['curso'];
		$_SESSION['curso'] = $idCurso;
		$alumnosCurso = Alumno::model()->findAllByAttributes(array('idCurso' => $idCurso, ));
		$this->render('calificar', array('alumnosCurso'=>$alumnosCurso,'evaluacion'=>$idEvaluacion, 'notasAlumno'=>$notasAlumno,));
	}

	public function actionSetCalificaciones(){
		//$idEvaluacion = $_POST['evaluacion'];

		$idEvaluacion = $_POST['idEvaluacion'];
		$notasAlumno = Alumnorindeevaluacion::model()->findAllByAttributes(array('idEvaluacion' => $idEvaluacion, ));
		$idCurso = $_SESSION['curso'];
		$alumnosCurso = Alumno::model()->findAllByAttributes(array('idCurso' => $idCurso, ));

		
		foreach ($alumnosCurso as $key) {
			$model = new Alumnorindeevaluacion;
			echo "evalucion: ".$idEvaluacion." alumno: ".$key['idAlumno']."<br>";
			$notaAlumno = $_POST['notaAlumno'.$key['idAlumno']];
			$model->idAlumno = $_POST['idAlumno'.$key['idAlumno']];
			$model->idEvaluacion = $_POST['idEvaluacion'];
			$model->nota = $notaAlumno;
			$model->save();
		}
		/*
		for ($i=1; $i < $nroAlumnos;) { 
			$model = new Alumnorindeevaluacion;
			$notaAlumno = $_POST['notaAlumno'.$i];
			$model->idAlumno = $_POST['idAlumno'.$i];
			$model->idEvaluacion = $_POST['idEvaluacion'];
			$model->nota = $_POST['notaAlumno'.$i];
			$model->save();
			$i++;
		}*/
		header('Location:?r=evaluacion/notas');
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
		$model=new Evaluacion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Evaluacion']))
		{
			$model->attributes=$_POST['Evaluacion'];
			if($model->save()){
				header('Location:?r=curso/cursos&modal=5');
			} else {
				header('Location:?r=curso/cursos&modal=6');
			}
		}




		$todosLosCursos = Curso::model()->findAll();

		$this->render('create',array(
			'model'=>$model,
			'todosLosCursos'=>$todosLosCursos
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

		if(isset($_POST['Evaluacion']))
		{
			$model->attributes=$_POST['Evaluacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idEvaluacion));
		}

		$todosLosCursos = Curso::model()->findAll();
		
		$this->render('update',array(
			'model'=>$model,
			'todosLosCursos'=>$todosLosCursos
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
		$dataProvider=new CActiveDataProvider('Evaluacion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Evaluacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Evaluacion']))
			$model->attributes=$_GET['Evaluacion'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Evaluacion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Evaluacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Evaluacion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='evaluacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
