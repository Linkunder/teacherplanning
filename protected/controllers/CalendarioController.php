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
				'actions'=>array('calendarios','WsDatosEvaluacionesCursos','WsDatosHorariosCursos'),
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

	 public function actionWsDatosEvaluacionesCursos(){
        //LLamada: index.php?r=producto/wsDatosProducto&id=2
        $id = -1;
        if(isset($_POST['idCurso'])){
            $id = $_POST['idCurso'];
        }


        $curso = Curso::model()->findByPk($id);
        $evaluacion = Evaluacion::model()->findAllByAttributes(array('idCurso' =>$id,));
       
        /* Modelo completo */
        //echo JSON::encode($producto);

        /* Modelo Personalizado */
        $cont=0;
        $datos_json = array();
        foreach ($evaluacion as $ev) {     
	        $datos_json[$cont] = array();
	        $datos_json[$cont]['id'] = $ev->idEvaluacion;
	        $datos_json[$cont]['title'] = $ev->nombre." ".$curso->nombre;
	        $datos_json[$cont]['description']= "Descripción: ".$ev->descripcion."</br>"."Ponderación: ".$ev->ponderacion."%"."</br>"."Institución: ".$curso->institucion;
	        $datos_json[$cont]['start'] = $ev->fecha;
	        $cont++;
        }


        echo CJSON::encode($datos_json);
    }

    public function actionWsDatosHorariosCursos(){
        //LLamada: index.php?r=producto/wsDatosProducto&id=2
        $id = -1;
        if(isset($_POST['idCurso'])){
            $id = $_POST['idCurso'];
        }

        $curso = Curso::model()->findByPk($id);
        $horarios = Horario::model()->findAllByAttributes(array('idCurso' =>$id,));
       
        /* Modelo completo */
        //echo JSON::encode($producto);

        /* Modelo Personalizado */
        $cont=0;
        $datos_json = array();
        foreach ($horarios as $horario) {     
	        $datos_json[$cont] = array();
	        $datos_json[$cont]['id'] = $horario->idHorario;
	        $datos_json[$cont]['title'] = $curso->nombre;
	        $datos_json[$cont]['description'] = "Institución: ".$curso->institucion."</br>"."Horario: ".$horario->horaInicio."-".$horario->horaFin;
	        $datos_json[$cont]['start'] = $horario->horaInicio;
	        $datos_json[$cont]['end'] = $horario->horaFin;
	        $datos_json[$cont]['dow'] = [$horario->dia];
	        $cont++;
        }


        echo CJSON::encode($datos_json);
    }




}