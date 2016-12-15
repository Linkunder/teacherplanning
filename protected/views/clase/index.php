<?php
/* @var $this ClaseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clases',
);
/*
$this->menu=array(
	array('label'=>'Agregar Clase', 'url'=>array('create')),
	array('label'=>'Control de Clases', 'url'=>array('admin')),
);
*/
?>

<h1>Clases</h1>

<!--
<pre>
	?= print_r($clasesPorCurso)?>
</pre>
-->


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<?php
	$indice = 0;
	foreach ($clasesPorCurso as $clase) {
	?>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="heading<?=$indice?>">
			<h4 class="panel-title">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$indice?>" aria-expanded="true" aria-controls="collapse">
					<?= $nombreCursos[$indice]; ?>
				</a>
			</h4>
		</div>
		<div id="collapse<?=$indice?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$indice?>">
			<form action="index.php?r=clase/create" method="post">
				<input hidden type="number" name="idCurso" value="<?= $idCursos[$indice]?>">
				<button type="submit" class="btn btn-md btn-success" href="#">Crear Clase</button>
			</form>

			<table class="table table-bordered table-responsive">
				<tr class="bg-primary">
					<th>Fecha</th>
					<th>Descripción</th>
					<th></th>
				</tr>

				<tbody>
				<?php
				for ($i=0; $i<count($clase); $i++) {
					?>
					<tr>
						<td><?= $clase[$i]->fecha ?></td>
						<td><?= $clase[$i]->descripcion ?></td>
						<td>
							<form action="index.php?r=clase/update&id=<?= $clase[$i]->idClase ?>" method="post">
								<input hidden type="number" name="idCurso" value="<?= $idCursos[$indice]?>">
								<button type="submit" class="btn btn-primary" href="#">Editar Clase</button>
							</form>
						</td>
					</tr>
					<?php
				}
				$indice++;
				?>
				</tbody>
			</table>

		</div>
	</div>
		<?php
	}
	?>
</div>

<!--
?php
for ($i=0; $i<count($clase); $i++) {
	?>
	<div class="panel-body">
		<strong>Fecha : </strong>?= $clase[$i]->fecha ?> <br>
		<strong>Descripción : </strong> <br> ?= $clase[$i]->descripcion ?>
	</div>
	?php
}
$indice++;
?>
-->


<!--
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">?= $nombreCursos[$indice]; ?></h3>
		</div>
		?php
		for ($i=0; $i<count($clase); $i++) {
			?>
			<div class="panel-body">
				<strong>Fecha : </strong>?= $clase[$i]->fecha ?> <br>
				<strong>Descripción : </strong> <br>
				?= $clase[$i]->descripcion ?>
			</div>
			?php
		}
		$indice++;
		?>
	</div>
	-->


<!--
?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
-->