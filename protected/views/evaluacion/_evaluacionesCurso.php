<?php
if (!empty($evaluacionesCurso)){
	?>

	<div class="panel-group" id="accordion">
	<?php 
	foreach ($evaluacionesCurso as $evaluacion){
		?>
		<div class="panel panel-default" id="panel<?php echo $evaluacion->idEvaluacion;?>">
			<div class="panel-heading">
				<h4 class="panel-title">
        			<a data-toggle="collapse" data-parent="#accordion" href="#collapseEval<?php echo $evaluacion->idEvaluacion;?>">
       					<?php echo $evaluacion->nombre;?>
       				</a>
      			</h4>
    		</div>
    		<div id="collapseEval<?php echo $evaluacion->idEvaluacion;?>" class="panel-collapse collapse">
    			<div class="panel-body">

				  <table class="table ">
				  	<tr>
				  		<td width="20%">Descripción</td>
				        <td><?= $evaluacion->descripcion ?></td>
				    </tr>
				    <tr>
				  		<td>Ponderación</td>
				        <td><?= $evaluacion->ponderacion." %" ?></td>
				    </tr>
				    <tr>
				  		<td>Fecha</td>
				        <td><?= $evaluacion->fecha ?></td>
				    </tr>
				  </table>
      			</div>
    		</div>
		</div>
	<?php
	} 
	?>
	</div>
	<?php
} else {
	echo "no hay evaluaciones";
}
?>