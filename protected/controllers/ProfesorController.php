<?php

class ProfesorController extends Controller
{
	public function actionIndex()
	{
		//Que vaya directamente al actionadmin, debido a que no puede realizar operaciones
		$this->actionAdmin();

	}

	
	public function actionAdmin()
	{
		$model=new Profesor('search');
		$model->unsetAttributes(); 
		if(isset($_GET['Profesor']))
			$model->attributes=$_GET['Profesor'];

		//Se filtra para que el administrador solo pueda ver profesores y no asi mismo
		$model->perfil = 0;
		$this->render('admin',array(
			'model'=>$model,
			));
	}
}