
<?php
$this->breadcrumbs=array(
	'Notas'=>array('index'),
	$model->nombre,
);

?>





<div class="page-header">
  <h2>Mis cursos</h2>
</div>


<div class="row">
	<table class="table table-bordered table-striped table-hover table-responsive">
	<thead>
		<tr>
			<th>
				#
			</th>
			<th>
				Institución
			</th>
			<th>
				Curso
			</th>
			<th>
				
			</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		foreach ($todosLosCursos as $key) {
		?>
		<tr>
			<td>
				<?php echo $key['idCurso']?>
			</td>
			<td>
				<?php echo $key['institucion']?>
			</td>
			<td>
				<?php echo $key['nombre']?>
			</td>
			<td>
				<button type="button" class="btn btn-success btn-md center-block col-md-12 cp" data-toggle="modal" data-target="#myModal" data-id="<?php echo $key['idCurso'];?>">
					Ver notas
				</button>
			</td>
			<td>
				<button type="button" class="btn btn-primary btn-md center-block col-md-12 cp" data-toggle="modal" data-target="#myModal" data-id="<?php echo $key['idCurso'];?>">
					Agregar notas
				</button>
			</td>
		</tr>
		<?php
		$i++;
		}
		?>
	</tbody>
</table>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Selecciona una evaluación</h4>
      </div>
      <div class="modal-body">
      	
      	<div id="cursos">
      		
      	</div>
      </div>
     
    </div>
  </div>
</div>


<script>
var idCurso;
$('.cp').click(function(e){
	e.preventDefault();
	idCurso = $(this).data('id');
});




$('#myModal').on('show.bs.modal',function(e){
	$('#cursos').load('index.php?r=evaluacion/partialEvaluaciones&idCurso='+idCurso);
});


</script>


