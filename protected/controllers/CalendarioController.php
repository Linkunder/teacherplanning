<?php

class CalendarioController extends Controller
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('calendarios'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('calendariocursos'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}




	public function actionPartialCalEvaluaciones(){
		$idAlumno = $_GET['idAlumno'];
		$cursos = Curso::model()->findAllByAttributes(array('idProfesor' => $idProfesor,));
		$this->renderPartial('_calendarioEvaluaciones', array('cursos'=>$cursos,));
	}
		public function actionPartialCalCursos(){
		$idAlumno = $_GET['idAlumno'];
		$todasLasAnotaciones = Anotacion::model()->findAllByAttributes(array('idProfesor' => $idAlumno, ));
		$this->renderPartial('_calendarioCursos', array('todasLasAnotaciones'=>$todasLasAnotaciones,));
	}


	public function actionCalendarios()
	{
		$idProfesor = Yii::app()->user->getState('usuario')->idProfesor;
		$cursos = Curso::model()->findAllByAttributes(array('idProfesor' => $idProfesor,));
		$cont = 0;
		foreach($cursos as $curso){
			
			$evaluaciones[$cont] = Evaluacion::model()->findAllByAttributes(array('idCurso' => $cursos[$cont]->idCurso,));
			$horarios[$cont] = Horario::model()->findAllByAttributes(array('idCurso' =>$cursos[$cont]->idCurso,));
			$cont++;
		}



		//configuramos las evaluaciones



		$this->render('calendario', array('cursos' => $cursos, 'evaluaciones' => $evaluaciones, 'horarios' => $horarios,));
	}
		public function actionCalendarioCursos()
	{
		$this->renderPartial('_calendarioCursos');
	}




}