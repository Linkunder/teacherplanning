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
  <table class="table table-bordered table-responsive">

      <tr class="bg-primary">
        <th width="10%">Alumno</th>
        <?php
        foreach ($evaluacionesCurso as $key) {
          ?>
          <th width="10%">
            <?php echo $key->nombre?>
            <small><?php echo "(".$key->ponderacion."%)"?></small>
          </th>
          <?php
        }
        ?>
        <th width="10%">Promedio</th>
      </tr>

      
  </table>
  <?php
}
?>