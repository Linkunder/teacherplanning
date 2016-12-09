<?php

class ClaseController extends Controller
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
				'users'=>array('@'),
			),
            /*
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'users'=>array('profesor'),
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
	    $model = $this->loadModel($id); // clase
		$this->render('view',array(
			'model'=> $model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Clase;

        //$themePath = Yii::app()->theme->baseUrl; //$baseUrl = Yii::app()->baseUrl;
        //$cs = Yii::app()->getClientScript();
        //$cs->registerScriptFile($themePath.'/assets/js/dual-list-box.js');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        /**** DUAL-LIST-BOX */
        $modelAlumno = new Alumno();

        $idCurso = Clase::model()->idCurso;
        $listaAlumnos = Alumno::model()->findAllByAttributes(['idCurso' => $idCurso]);

        $criteria = new CDbCriteria;
        $criteria->addCondition('idAlumno=:id');
        $criteria->params = array(':id' => 1);
        $paidAlumnos = Alumno::model()->findAll($criteria);
        /**** FIN DUAL-LIST-BOX */

		if(isset($_POST['Clase']))
		{
			$model->attributes=$_POST['Clase'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idClase));
		}

		$todosLosCursos = Curso::model()->findAll();

		$this->render('create',array(
			'model'=>$model,
			'todosLosCursos'=>$todosLosCursos,
            'modelAlumno' => $modelAlumno,
            'listaAlumnos' => $listaAlumnos,
            'paidAlumnos' => $paidAlumnos,
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

		if(isset($_POST['Clase']))
		{
			$model->attributes=$_POST['Clase'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idClase));
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
        $todosLosCursos = Curso::model()->findAllByAttributes(['idProfesor' => Yii::app()->user->getState('usuario')->idProfesor]);
        $clasesPorCurso = [];
        $nombreCursos = [];
        foreach ($todosLosCursos as $curso){
            array_push($nombreCursos, $curso->nombre);
            $clases = Clase::model()->findAllByAttributes(['idCurso' => $curso->idCurso]);
            array_push($clasesPorCurso, $clases);
        }

		$dataProvider=new CActiveDataProvider('Clase');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'todosLosCursos' => $todosLosCursos,
            'clasesPorCurso' => $clasesPorCurso,
            'nombreCursos' => $nombreCursos,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Clase('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Clase']))
			$model->attributes=$_GET['Clase'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Clase the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Clase::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Clase $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='clase-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
