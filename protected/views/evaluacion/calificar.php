

<div class="page-header">
  <h2>Calificaciones evaluación <?php echo $evaluacion?></h2>
</div>



<div class="row">
	<table class="table table-bordered table-striped table-hover table-responsive">
	<thead>
		<tr>
			<th width='15%'>
				Alumno
			</th>
			<th width='5%'>
				Nota (1.0 -> 7.0)
			</th>
			<?php
			if (!empty($notasAlumno)){
				?>
				<th width='5%'>Estado</th>
				<?php
			}
			?>
		</tr>
	</thead>
	<tbody>
		<form method="post" action="?r=evaluacion/setCalificaciones">
			<input name="idEvaluacion" value="<?php echo $evaluacion?>" hidden>
		<?php
		$i = 1;
		foreach ($alumnosCurso as $key) {
		?>
		<tr>
			<td>
				<?php echo $key['nombre']." ".$key['apellido'];
				$idAlumno = $key['idAlumno'];
				?>
			</td>
			<?php
			if (empty($notasAlumno)){
				$aux = 1;
			?>
			<td>
				<input type="number" name="notaAlumno<?php echo $key['idAlumno']?>"  step='0.1' min="1" max="7" required> 
				<input name="idAlumno<?php echo $key['idAlumno']?>" value="<?php echo $key['idAlumno']?>" hidden>
			</td>
			<?php
			} else {
				$aux = 5;
				?>
				<td>
					<?php
					foreach ($notasAlumno as $item ) {
						$alumno = $item['idAlumno'];
						if ($idAlumno == $alumno){
							$notaAlumno = $item['nota'];
							echo $notaAlumno;
						}
					}
					?>
				</td>
				<td>
					<?php
					if ($notaAlumno >= 4){
						echo "<span class='label label-primary'>Aprobado</span>";
					} else {
						echo "<span class='label label-danger'>Reprobado</span>";
					}
					?>
				</td>
				<?php
			}
			?>

			
		</tr>
		<?php
		$i++;
		}
		$nroAlumnos = $i;
		?>
		
		<input name="nroAlumnos" value="<?php echo $nroAlumnos?>" hidden>

		
	</tbody>
	</table>
		<div>
			<?php
			if ($aux != 1){
				?>

				<?php
			} else {
				?>
				<button type="submit" class="btn btn-primary col-md-12">Aceptar</button>
				<?php
			}
			?>	
		</div>
		</form>
</div>


</form>

