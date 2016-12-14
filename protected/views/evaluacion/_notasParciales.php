<?php

if (empty($evaluacionesCurso)){

  ?>
  <p>Usted no ha realizado evaluaciones en este curso.</p>
  <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
  </div>
  <?php
} else {

  if (empty($notasAlumno)){
    ?>
    <p>Usted no ha ingresado notas.</p>
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

      <?php
      foreach ($alumnosCurso as $key) {
        ?>
        <tr>
          <td>
            <?php
            $aux = 0;
            $idAlumno = $key->idAlumno;
            echo $key->nombre." ".$key->apellido;
            ?>
          </td>
          <?php
          $notas = array();
          foreach ($notasCurso as $eval) {
            foreach ($eval as $key ) {
              if ($key->idAlumno == $idAlumno){
                ?>
                <td>
                  <?php 
                  $aux = $aux+ $key->nota;
                  $notas[$idAlumno] = $aux; 
                  echo $key->nota;
                  ?>
                </td>
                <?php
              } 
            }
          }
          ?>
          <td>
            <?php
            $eval = count($evaluacionesCurso);
            foreach ($notas as $key => $value) {
              $prom = round($value/$eval,1);
              echo $prom;
              if ($prom >=4){
                ?>
                <span class="label label-primary">  Aprobado</span>
                <?php
              } else {
                ?>
                <span class="label label-danger">  Reprobado</span>
                <?php
              }

            }
            ?>
          </td>
        </tr>
        <?php
      }
      ?>


    </table>

    <?php
  }

  ?>

  <?php
}
?>