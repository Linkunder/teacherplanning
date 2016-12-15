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
	public function actionCreate() {
		$model = new Clase;
        $todosLosCursos = Curso::model()->findAllByAttributes(['idProfesor' => Yii::app()->user->getState('usuario')->idProfesor]);

        if(isset($_POST['idCurso'])) {
            $idCurso = $_POST['idCurso'];

            $listaAlumnos = [];
            $listaAsistencia = [];
            $alumnosCurso = Alumno::model()->findAllByAttributes(['idCurso' => $idCurso]);
            foreach ($alumnosCurso as $alumno) {
                array_push($listaAlumnos, $alumno);
            }
        }

        /* *** DUAL-LIST-BOX *
        $listaAlumnos = [];
        $listaAsistencia = []; // inicialmente vacia porque creamos un curso y no se ha pasado lista

        foreach ($todosLosCursos as $curso){
            $alumnosCurso = Alumno::model()->findAllByAttributes(['idCurso' => $curso->idCurso]);
            foreach ($alumnosCurso as $alumno){
                array_push($listaAlumnos, $alumno);
            }
        }
        **** FIN DUAL-LIST-BOX */

		if(isset($_POST['Clase'])) {
			$model->attributes=$_POST['Clase'];

			if($model->save()){
                if (isset($_POST["listaAsistencia"])){
                    $alumnos = $_POST["listaAsistencia"];
                    for ($i=0; $i<count($alumnos) ; $i++) {
                        $asistencia = new Asistencia();
                        $idAlumno = $alumnos[$i];
                        $asistencia->idClase = $model->idClase;
                        $asistencia->idAlumno = $idAlumno;
                        $asistencia->save();
                    }
                }

                $this->redirect(array('view','id'=>$model->idClase));
            }
		}

		$this->render('create',array(
			'model'=>$model,
			'todosLosCursos'=>$todosLosCursos,
            'listaAlumnos' => $listaAlumnos,
            'listaAsistencia' => $listaAsistencia,
            'idCurso' => $idCurso,
		));

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id){
		$model=$this->loadModel($id);
        $idProfesor = Yii::app()->user->getState('usuario')->idProfesor;
        $todosLosCursos = Curso::model()->findAllByAttributes(['idProfesor' => $idProfesor]);

        //$cursos = Yii::app()->db->createCommand("SELECT count(*) as cantidad FROM Curso WHERE idProfesor = '$idProfesor'")->queryAll();

        /**** DUAL-LIST-BOX */
        $idAlumnosAsistencia = Asistencia::model()->findAllByAttributes(['idClase' => $id]);

        if(isset($_POST['idCurso'])) {
            $idCurso = $_POST['idCurso'];

            $alumnos = [];
            $alumnosNoAsistieron = Yii::app()->db->createCommand("select idAlumno from Alumno where idCurso='$idCurso' and idAlumno not in(SELECT j.idAlumno
                                                            FROM Alumno i, Asistencia j
                                                            WHERE i.idAlumno = j.idAlumno and j.idClase = '$id')")->queryAll();
            foreach ($alumnosNoAsistieron as $alumnoNoAsistio) {
                array_push($alumnos, $alumnoNoAsistio);
            }

            $listaAlumnos = [];
            foreach ($alumnos as $alumno) {
                array_push($listaAlumnos, Alumno::model()->findByAttributes(['idAlumno' => $alumno]));
            }
        }
        /*
        $alumnos = [];
        foreach ($todosLosCursos as $curso){
            $alumnosNoAsistieron = Yii::app()->db->createCommand("select idAlumno from Alumno where idCurso='$curso->idCurso' and idAlumno not in(SELECT j.idAlumno
                                                                    FROM Alumno i, Asistencia j
                                                                    WHERE i.idAlumno = j.idAlumno and j.idClase = '$id')")->queryAll();
            foreach ($alumnosNoAsistieron as $alumnoNoAsistio){
                array_push($alumnos, $alumnoNoAsistio);
            }
        }
        $listaAlumnos = [];
        foreach ($alumnos as $alumno){
            array_push($listaAlumnos, Alumno::model()->findByAttributes(['idAlumno' => $alumno]));
        }
        */

        $listaAsistencia = [];
        foreach ($idAlumnosAsistencia as $alumnoAsiste){
            array_push($listaAsistencia, Alumno::model()->findByAttributes(['idAlumno' => $alumnoAsiste->idAlumno]));
        }
        /**** FIN DUAL-LIST-BOX */

		if(isset($_POST['Clase'])) {
			$model->attributes=$_POST['Clase'];
			if($model->save()) {

                if (isset($_POST["listaAsistencia"])){
                    $alumnos = $_POST["listaAsistencia"];
                    // guardamos la lista actualizada con los nuevos participantes
                    for ($i=0; $i<count($alumnos) ; $i++) {
                        $asistencia = new Asistencia();
                        $idAlumno = $alumnos[$i];
                        $asistencia->idClase = $model->idClase;
                        $asistencia->idAlumno = $idAlumno;
                        $asistencia->save();
                    }
                }

                $this->redirect(array('view','id'=>$model->idClase));
            }
		}

		$this->render('update',array(
			'model'=>$model,
			'todosLosCursos'=>$todosLosCursos,
            'listaAlumnos' => $listaAlumnos,
            'listaAsistencia' => $listaAsistencia,
            'idCurso' => $idCurso,
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
        $idCursos =[];
        $nombreCursos = [];
        foreach ($todosLosCursos as $curso){
            array_push($nombreCursos, $curso->nombre);
            $clases = Clase::model()->findAllByAttributes(['idCurso' => $curso->idCurso]);
            array_push($clasesPorCurso, $clases);
            array_push($idCursos, $curso->idCurso);
        }

		$dataProvider=new CActiveDataProvider('Clase');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'todosLosCursos' => $todosLosCursos,
            'clasesPorCurso' => $clasesPorCurso,
            'nombreCursos' => $nombreCursos,
            'idCursos' => $idCursos,
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
