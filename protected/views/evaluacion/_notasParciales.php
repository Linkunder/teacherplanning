<?php
if (empty($evaluacionesCurso)){

  ?>
  <p>Usted no ha realizado evaluaciones en este curso.</p>
  <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
  </div>
  <?php
} else {
  var_dump($notasAlumno);
  ?>
  <table class="table table-bordered table-responsive">

    <tr class="bg-primary">
      <th width="10%">Alumno</th>
      <?php
      $eval = count($evaluacionesCurso);
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

    <?php
    foreach ($alumnosCurso as $key) {
      ?>
      <tr>
        <td>
          <?php
          $idAlumno = $key->idAlumno;
          echo $key->nombre." ".$key->apellido;
          ?>
        </td>
        <?php
        foreach ($notasCurso as $eval) {
          foreach ($eval as $key ) {
            if ($key->idAlumno == $idAlumno){
              ?>
              <td><?php echo $key->nota?></td>
              <?php
            } 
          }
        }
        ?>
      </tr>
      <?php
    }
    ?>


  </table>
  <?php
}
?>