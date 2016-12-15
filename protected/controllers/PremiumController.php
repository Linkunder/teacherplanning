<?php

class PremiumController extends Controller
{

	
	public function actionpremium()
	{
		$idProfesor = $_POST['idProfesor'];
		$profesor = Profesor::model()->findAllByAttributes(array('idProfesor' => $idProfesor, ));
		foreach ($profesor as $key ) {
			$key->itsfree = 1;
			$key->update();
		}

		$profesor = Profesor::model()->findByAttributes(array('idProfesor' => $idProfesor, ));
		$profesor->itsfree = 1;
		Yii::app()->user->setState('usuario', $profesor);


		header('Location:?r=curso/cursos&modal=9');
		/*
		foreach ($alumnosCurso as $key) {
			//$model = new Alumnorindeevaluacion;
			$idAlumno = $key->idAlumno;
			$model = Alumnorindeevaluacion::model()->findAllByAttributes(array('idEvaluacion' => $idEvaluacion, 'idAlumno'=>$idAlumno,));
			foreach ($model as $key ){
				if ($key->idAlumno == $idAlumno) {
					$notaAlumno = $_POST['notaAlumno'.$key->idAlumno];
					$key->nota = $notaAlumno;
				} 
				$key->update();
			}
*/
			//$model->nota =$notaAlumno;
			/*
			
			$model->idAlumno = $idAlumno;
			$model->idEvaluacion = $idEvaluacion;
			$model->nota = $notaAlumno;*/
			//$model->update();
		
		//header('Location:?r=curso/cursos');
	}
}