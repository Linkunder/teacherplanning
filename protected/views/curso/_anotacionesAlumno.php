      <!--Estudiantes del curso -->
     <table id="myTableAnotacion" class="table table-bordered table-striped table-hover table-responsive">
	 <thead>
		<th>Nombre</th>
		<th>Descripción</th>
		<th></th>

	</thead>
	<?php $cont=0; ?>
	<?php 
	foreach ($todasLasAnotaciones as $anotacion) {
				$cont++;
	?>			
		<tr>
			<td><?php echo $anotacion->nombre ?></td>
			<td><?php echo $anotacion->descripcion ?></td>

			<td><button id="<?php echo $anotacion->idAnotacion;?>" type="submit" class="btn btn-md btn-danger be" href="#" data-toggle="modal" data-target="#modalEliminar" data-id="<?php echo $anotacion->idAnotacion;?>">Eliminar</button></td>
			

		</tr>
	<?php 
		} //fin Foreach
	?>
	
		</table>
	<?php if($cont == 0){ ?>
			<div class="alert alert-danger fade in">
             Este alumno no registra anotaciones asociadas
            </div> 
      <?php } ?>
      <!--Estudiantes del curso -->

<?php 



?>
<script type="text/javascript">
	id=0;
	$('.be').click(function (e){
      	e.preventDefault();
      	id=$(this).data('id');
      	$.post('/teacherplanning/index.php?r=anotacion/delete&id='+id);

      	$('#myModal').fadeOut('slow', function(){
      		$(this).modal('hide')}).fadeIn('slow', function(){
      			$(this).modal('show');
      		});
      	});

	
</script>
