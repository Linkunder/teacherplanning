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
		$idProfesor = Yii::app()->user->getState('usuario')->idProfesor;
		//Datos para el resumen general
		$cursos = Yii::app()->db->createCommand("SELECT count(*) as cantidad FROM Curso WHERE idProfesor = '$idProfesor'")->queryAll();
		$alumnos = Yii::app()->db->createCommand("SELECT sum(cantidad) as cantidad FROM (SELECT Alumno.idCurso, count(*) AS cantidad FROM Alumno INNER JOIN Curso ON Curso.idCurso = Alumno.idCurso WHERE Curso.idProfesor = '$idProfesor' GROUP BY idCurso) AS t1")->queryAll();
		$anotaciones	= Yii::app()->db->createCommand("SELECT IFNULL(SUM(cantidad), 0) AS cantidad FROM (SELECT Anotacion.idAlumno, count(*) AS cantidad FROM Anotacion INNER JOIN Alumno ON Anotacion.idAlumno = Alumno.idAlumno INNER JOIN Curso ON Curso.idCurso = Alumno.idCurso WHERE Curso.idProfesor = '$idProfesor' GROUP BY idAlumno) AS t1")->queryAll();
		
		$evaluaciones	= Yii::app()->db->createCommand("SELECT IFNULL(SUM(cantidad), 0) AS cantidad FROM (SELECT Evaluacion.idCurso, count(*) AS cantidad FROM Evaluacion INNER JOIN Curso ON Curso.idCurso = Evaluacion.idCurso WHERE Curso.idProfesor = '$idProfesor' GROUP BY idCurso) AS t1")->queryAll();
		
		//Datos de los graficos
		$graficoAlumnosCurso = Yii::app()->db->createCommand("SELECT Alumno.idCurso, Curso.nombre, count(*) AS cantidad FROM Alumno INNER JOIN Curso ON Curso.idCurso = Alumno.idCurso WHERE Curso.idProfesor = '$idProfesor' GROUP BY idCurso")->queryAll();
		
		$graficoCursoInstitucion = Yii::app()->db->createCommand("SELECT Curso.institucion, count(*) AS cantidad FROM Curso WHERE Curso.idProfesor = '$idProfesor' GROUP BY Curso.institucion")->queryAll();

		
		$cursoEvaluacion = Yii::app()->db->createCommand("SELECT Evaluacion.idCurso, count(*) AS cantidad , Curso.nombre FROM Evaluacion INNER JOIN Curso on Evaluacion.idCurso = Curso.idCurso WHERE Curso.idProfesor = '$idProfesor' GROUP BY Evaluacion.idCurso")->queryAll();

		
		
		$this->render('reportes', array('cursos'=>$cursos, 'alumnos' =>$alumnos, 'anotaciones'=>$anotaciones, 'evaluaciones'=>$evaluaciones, 'graficoAlumnosCurso'=>$graficoAlumnosCurso,'graficoCursoInstitucion' => $graficoCursoInstitucion, 'cursoEvaluacion' => $cursoEvaluacion,));
	}







}