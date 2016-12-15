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

    /*
    public function actionCreate(){
        $model = new Profesor;

        if(isset($_POST['Profesor'])) {
            $model->attributes=$_POST['Profesor'];
            $model->perfil = 0;
            $model->itsfree = 0;
            $model->save();

            if($model->save())
                $this->redirect(array('view','id'=>$model->idHorario));

        }

        $this->render('create',array(
            'model'=> $model,
        ));
    }
    */

    public function actionCreate(){
    	$model = new Profesor;

    	if(isset($_POST['Profesor'])) {
    		$model->attributes=$_POST['Profesor'];
    		$model->save();

    		if($model->save()){
					header('Location:/teacherplanning');
				}else{
					header('Location:/teacherplanning');
				}

    	}

    }
}