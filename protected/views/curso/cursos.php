<?php

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
  );

  ?>

  <?php if($alerta==1){ ?>
  <div class="alert alert-success">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Listo!</strong> Se ha ingresado la anotación.
 </div>
 <?php }
 if($alerta == 2){ ?>
 <div class="alert alert-danger">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>ups!</strong> No se ha podido ingresar la anotación.
 </div>
 <?php }
 ?>


 <?php if($alerta==3){ ?>
 <div class="alert alert-success">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Listo!</strong> Se ha ingresado el curso.
 </div>
 <?php }
 if($alerta == 4){ ?>
 <div class="alert alert-danger">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>ups!</strong> No se ha podido ingresar el curso.
 </div>
 <?php }
 ?>

 <?php if($alerta==5){ ?>
 <div class="alert alert-success">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Listo!</strong> Se ha ingresado la evaluación.
 </div>
 <?php }
 if($alerta == 6){ ?>
 <div class="alert alert-danger">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>ups!</strong> No se ha podido ingresar la evaluación.
 </div>
 <?php }
 ?>

 <?php if($alerta==7){ ?>
 <div class="alert alert-success">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Listo!</strong> Se ha ingresado el alumno al curso.
 </div>
 <?php }
 if($alerta == 8){ ?>
 <div class="alert alert-danger">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>ups!</strong> No se ha podido ingresar el alumno al curso.
 </div>
 <?php }
 ?>


<?php if($alerta==9){ ?>
 <div class="alert alert-success">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Felicidades!</strong> Ahora posees una cuenta Premium.
 </div>
 <?php } ?>


 <h1>Mis cursos</h1>
 <?php
 $idProfesor = Yii::app()->user->getState('usuario')->idProfesor;
 $premium = Yii::app()->user->getState('usuario')->itsfree;
 //echo $premium;


 ?>

 <p><strong>Instrucciones</strong>: Para agregar un curso debes hacer click 

  <?php
  if (count($todosLosCursos) < 3 || $premium==1 ){
    ?>

    <button id="<?php echo $idProfesor;?>" class="btn btn-xs btn-primary nv" data-toggle="modal" data-target="#nuevoCurso" data-id="<?php echo $idProfesor;?>">
     aqui</button>. 
     <?php
   } else {
    ?>

    <button id="<?php echo $idProfesor;?>" class="btn btn-xs btn-primary pr" data-toggle="modal" data-target="#premium" data-id="<?php echo $idProfesor;?>">
     aqui</button>. 
     <?php
   }
   ?>

   Una vez que tengas cursos para
   administrar, puedes agregar alumnos, una vez hecho esto, puedes ver sus notas parciales y agregar una evaluación con las notas
   de tus alumnos</p>

   <?php
   if (empty($todosLosCursos)){
    ?>
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Ups!</strong> No tienes cursos asociados.
    </div>
    <?php
  } 
  ?>

  <!--Acordion que despliega los cursos del profesor (avance 1 = idProfesor = 1 )-->
  <div class="panel-group" id="accordion">
    <?php foreach($todosLosCursos AS $curso){?>
    <div class="panel panel-default" id="panel<?php echo $curso->idCurso;?>">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $curso->idCurso;?>">
            <?php 
            echo $curso->nombre;
            ?></a>
          </h4>
        </div>
        <div id="collapse<?php echo $curso->idCurso;?>" class="panel-collapse collapse">
          <div class="panel-body">
            <div id="alumnos">
              <!--Estudiantes del curso -->
              <!--Aqui se debe hacer un RenderPartial()-->
              <?php $this->renderPartial('_alumnosCurso', array('todosLosAlumnos'=>$todosLosAlumnos, 'idCurso' => $curso->idCurso));?>
              <!--Estudiantes del curso -->
            </div>
          </div>
        </div>
      </div>

      <?php }?>

    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Anotaciones</h4>
          </div>
          <div class="modal-body">
            <div id="anotaciones">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    <div id="modalAgregar" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Anotación</h4>
          </div>
          <div class="modal-body">
           <?php $this->renderPartial('_formModal', array('model'=>$model,));?>

         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


  <div id="modalNotas" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Notas parciales</h4>
        </div>
        <div class="modal-body">
          <div id="notas">
          </div>
        </div>



      </div>

    </div>
  </div>



  <div id="modalEvaluacion" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nueva evaluación</h4>
        </div>
        <div class="modal-body">
          <?php $this->renderPartial('_formEvaluacion', array('modelEvaluacion'=>$modelEvaluacion,));?>
        </div>
      </div>

    </div>
  </div>



  <!-- Modal -->
  <div id="modalEvaluaciones" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Evaluaciones del curso</h4>
        </div>
        <div class="modal-body">
          <div id="evaluaciones">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


  <div id="nuevoCurso" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo curso</h4>
        </div>
        <div class="modal-body">
          <?php
          $this->renderPartial('_formCurso', array('modelCurso'=>$modelCurso,));
          
          ?>
        </div>
      </div>

    </div>
  </div>


  <div id="nuevoAlumno" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo alumno</h4>
        </div>
        <div class="modal-body">
          <?php $this->renderPartial('_formAlumno', array('modelAlumno'=>$modelAlumno,));?>
        </div>
      </div>

    </div>
  </div>

  <div id="premium" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">¡Cuenta limitada!</h4>
        </div>
        <div class="modal-body">
          <h5>Para crear más cursos, compra una cuenta premium de TeacherPlanning.</h5>
          <div class="row">
          <div class="col-md-3"></div>
            <div class="col-md-6">
              <img src="/teacherplanning/themes/kongoon/assets/images/premium.jpg" class="img-responsive" style="margin: 0 auto;">
            </div>
            <div class="col-md-3"></div>
          </div>
          <div class="row">

          <form method="post" action="/teacherplanning/index.php?r=premium/premium">
            <input name="idProfesor" value="<?php echo $idProfesor?>" hidden/>

              <button class="btn btn-lg btn-danger col-md-6" data-dismiss="modal">Volver</button>            
              <button class="btn btn-lg btn-success col-md-6" >Suscribirse</button>
          </form>

            
          </div>
        </div>
      </div>

    </div>
  </div>



  <script>
      //Con este script tomaremos el id del alumno para buscar sus anotaciones
      var idAlumno;

      $('.cp').click(function (e){
      	e.preventDefault();
      	idAlumno = $(this).data('id');
      });

      $('.nc').click(function (e){
        e.preventDefault();
        idCurso = $(this).data('id');
      });

      $('.nv').click(function (e){
        e.preventDefault();
        idProfesor = $(this).data('id');
      });

      $('.pr').click(function (e){
        e.preventDefault();
        idProfesor = $(this).data('id');
      });





      // Anotaciones 
      $('#myModal').on('show.bs.modal', function (e){
      	$('#anotaciones').load('index.php?r=anotacion/partialAnotaciones&idAlumno='+ idAlumno);
      });

      $('#modalAgregar').on('show.bs.modal', function (e){
      	document.getElementsByName("Anotacion[idAlumno]")[0].setAttribute("value", idAlumno);
      });
      // Fin anotaciones


      // Notas parciales.
      $('#modalNotas').on('show.bs.modal', function (e){
        $('#notas').load('index.php?r=evaluacion/partialEvaluaciones&idCurso='+ idCurso);
      });

      // Agregar una evaluación.
      $('#modalEvaluacion').on('show.bs.modal', function (e){
        document.getElementsByName("Evaluacion[idCurso]")[0].setAttribute("value", idCurso);
      });

      // Ver evaluaciones del curso. (para luego agregar las notas de una evaluación)
      $('#modalEvaluaciones').on('show.bs.modal', function (e){
        $('#evaluaciones').load('index.php?r=evaluacion/partialEvaluar&idCurso='+ idCurso);
      });


      // Agregar un curso.
      $('#nuevoCurso').on('show.bs.modal', function (e){
        document.getElementsByName("Curso[idProfesor]")[0].setAttribute("value", idProfesor);
      });


      // Nuevo alumno a un curso.
      $('#nuevoAlumno').on('show.bs.modal', function (e){
        document.getElementsByName("Alumno[idCurso]")[0].setAttribute("value", idCurso);
      });



    </script>











