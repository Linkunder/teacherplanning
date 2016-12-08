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

<h1>Mis cursos</h1>

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




      <script>
      //Con este script tomaremos el id del alumno para buscar sus anotaciones
      var idAlumno;

      $('.cp').click(function (e){
      	e.preventDefault();
      	idAlumno = $(this).data('id');
      });

      $('#myModal').on('show.bs.modal', function (e){
      	$('#anotaciones').load('index.php?r=anotacion/partialAnotaciones&idAlumno='+ idAlumno);
      });

      $('#modalAgregar').on('show.bs.modal', function (e){
      	document.getElementsByName("Anotacion[idAlumno]")[0].setAttribute("value", idAlumno);
      	
      });
      </script>

      









