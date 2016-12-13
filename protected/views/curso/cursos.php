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


 <h1>Mis cursos</h1>
 <?php
 $idProfesor = Yii::app()->user->getState('usuario')->idProfesor;
 ?>

 <p><strong>Instrucciones</strong>: Para agregar un curso debes hacer click 
   <button id="<?php echo $idProfesor;?>" class="btn btn-xs btn-primary nv" data-toggle="modal" data-target="#nuevoCurso" data-id="<?php echo $idProfesor;?>">
     aqui</button>. 
     Una vez que tengas cursos para
     administrar, puedes agregar alumnos, una vez hecho esto, puedes ver sus notas parciales y agregar una evaluación con las notas
     de tus alumnos</p>

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
            <?php $this->renderPartial('_formCurso', array('modelCurso'=>$modelCurso,));?>
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

    </script>











