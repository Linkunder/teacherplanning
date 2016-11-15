      <!--Estudiantes del curso -->

     <table id="myTable<?php echo $idCurso?>" class="table table-bootstrap striped">
	 <thead>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Correo</th>
		<th></th>


	</thead>
	<?php $cont=0; ?>
	<?php foreach($todosLosAlumnos AS $alumno){ 
			if($idCurso == $alumno->idCurso){
				$cont++;
	?>			
		<tr>
			<td><?php echo $alumno->nombre ?></td>
			<td><?php echo $alumno->apellido ?></td>
			<td><?php echo $alumno->mail ?></td>
			<td> <button id="<?php echo $alumno->idAlumno;?>" type="button" class="btn btn-md btn-primary cp" href="#" data-toggle="modal" data-target="#myModal" data-id="<?php echo $alumno->idAlumno;?>">Ver anotaciones</button>
			<button id="<?php echo $alumno->idAlumno;?>" type="button" class="btn btn-md btn-success cp" href="#" data-toggle="modal" data-target="#modalAgregar" data-id="<?php echo $alumno->idAlumno;?>" >Agregar</button>
		
			</td>

		</tr>
	<?php 
			} //fin IF
		} //fin Foreach
	?>
	
		</table>
	<?php if($cont == 0){ ?>
			<div class="alert alert-danger fade in">
             No hay alumnos en este curso
            </div> 
      <?php } ?>
      <!--Estudiantes del curso -->
<script type="text/javascript">
	
		var cont = 0; 
         $(document).ready(function() {
         	
         	cont= <?php echo $cont; ?>;
         	if(!(cont=='0')){
            $('#myTable<?php echo $idCurso; ?>').DataTable({
              responsive: true,
            });
        	}
        } );


</script>






