<?php
if (empty($evaluacionesCurso)){
  ?>
  <p>Usted no ha realizado evaluaciones en este curso.</p>
  <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
  </div>
  <?php
} else {
  ?>
  <p>Selecciona una de las evaluaciones de este curso para agregar las notas de los alumnos.</p>
  <form method="post" action="?r=evaluacion/calificar">
    <div class="form-group">
      <label for="evaluacion">Evaluación: </label>
      <select class="form-control" id="exampleSelect1" name="evaluacion" >
        <option value="" selected disabled>Selecciona una evaluación</option>
        <?php
        foreach ($evaluacionesCurso as $evaluacion) {
          ?>
          <option value="<?php echo $evaluacion['idEvaluacion']?>"><?php echo $evaluacion['nombre']." - ".$evaluacion['descripcion']?></option>
          <?php
        }
        ?>
      </select>
      <input name="curso" value="<?php echo $evaluacion['idCurso']?>" hidden>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
  </form>
  <?php
}
?>