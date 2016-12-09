      <!--Estudiantes del curso -->


      	<?php
      	$aux = 0;
      	foreach($todosLosAlumnos AS $alumno){ 
      		if($idCurso == $alumno->idCurso){
      			$aux++;
      		}
      	}

      	if ( $aux == 0){
      		?>
      		<div class="alert alert-danger fade in">
             No hay alumnos en este curso
            </div>

	      	<strong>Acciones: </strong> 
	      	<br/>
	      	<br/>
	      	<div class="row">
	      		<div class="col-md-4">
	      			<center><button class="btn btn-sm btn-primary cp" data-toggle="modal" data-target="#modalAlumno">
	      				Agregar nuevo alumno <span class="glyphicon glyphicon-user" aria-hidden="true"></span></button>
	      			</center>
	      		</div>
	      	</div>

	      	<br/>

      		<?php
      	} else {
      		?>


	      	<strong>Acciones: </strong> 
	      	<br/>
	      	<br/>
	      	<div class="row">
	      		<div class="col-md-4">
	      			<center><button id="<?php echo $idCurso;?>" class="btn btn-sm btn-primary nc" data-toggle="modal" data-target="#modalNotas" data-id="<?php echo $idCurso;?>">
	      				Ver notas parciales <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
	      			</center>
	      		</div>
	      		<div class="col-md-4">
	      			<center><button id="<?php echo $idCurso;?>" class="btn btn-sm btn-primary nc" data-toggle="modal" data-target="#modalEvaluaciones" data-id="<?php echo $idCurso;?>"> 
	      				Ver evaluaciones <span class="glyphicon glyphicon-book" aria-hidden="true"></span></button>
	      			</center>
	      		</div>
	      		<div class="col-md-4">
	      			<center><button id="<?php echo $idCurso;?>" class="btn btn-sm btn-primary nc" data-toggle="modal" data-target="#modalEvaluacion" data-id="<?php echo $idCurso;?>" >
	      				Agregar evaluación 
	      				<span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span></button>
	      			</center>
	      		</div>
	      	</div>
      		<br/>
      		<table id="myTable<?php echo $idCurso?>" class="table table-bordered table-striped table-hover table-responsive">
      			<thead>
      				<tr>
      					<th>Nombre</th>
	      				<th>Correo</th>
	      				<th></th>
      				</tr>
      			</thead>
      			<tbody>
      				<?php
      				foreach($todosLosAlumnos AS $alumno){ 
      					if($idCurso == $alumno->idCurso){
      				?>
      				<tr>
						<td><?php echo $alumno->nombre." ".$alumno->apellido ?></td>
						<td><?php echo $alumno->mail ?></td>
						<td> <button id="<?php echo $alumno->idAlumno;?>" type="button" class="btn btn-md btn-primary cp" href="#" data-toggle="modal" data-target="#myModal" data-id="<?php echo $alumno->idAlumno;?>">Ver anotaciones</button>
						<button id="<?php echo $alumno->idAlumno;?>" type="button" class="btn btn-md btn-success cp" href="#" data-toggle="modal" data-target="#modalAgregar" data-id="<?php echo $alumno->idAlumno;?>" >Agregar 
						 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
						</td>
      				</tr>
      				<?php
      				}
      				}
      				?>
      			</tbody>
      		</table>

      	<?php
      	}
      	?>





















