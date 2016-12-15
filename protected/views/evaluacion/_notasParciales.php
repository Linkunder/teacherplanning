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

    <div id="dvData2">
      <table class="table table-bordered table-responsive" align="center">

        <tr class="bg-primary" >
          <th width="15%" >Alumno</th>
          <?php
          $numeroEvaluaciones = count($evaluacionesCurso);
          
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
          <th width="10%">Situación</th>

        </tr>

        <?php
        foreach ($alumnosCurso as $key) {
          ?>
          <tr>
            <td>
              <?php
              $aux = 0;
              $notaI = 0;
              $idAlumno = $key->idAlumno;
              echo $key->nombre." ".$key->apellido;
              ?>
            </td>
            <?php
            $notas = array();
            $cont = 0;
            $numeroNotasCurso = count($notasCurso);
            foreach ($notasCurso as $eval) {
              foreach ($eval as $key ) {

                $aux = 0;
                if ($key->idAlumno == $idAlumno){
                  ?>
                  <td>
                    <center>
                      <?php 
                      //$aux = $aux+ $key->nota;
                      //$notas[$idAlumno] = $aux; 
                      echo $key->nota;
                      foreach ($evaluacionesCurso as $item) {
                        if ($item->idEvaluacion == $key->idEvaluacion){

                          //echo "<br> cont: ".$cont;
                          $cont++;
                        //  echo "<br> cont: ".$cont;
                          $aux = $aux+ ($key->nota*(($item->ponderacion)/100));
                          //echo "<br> aux: ".$aux;
                          $notas[$key->idEvaluacion] = $aux;
                        }
                      }
                      //echo "<br>id ".$key->idEvaluacion;
                      ?>
                    </center>
                  </td>
                  <?php

                } 
              }
            }
            ?>
            <?php
            if ($cont<$numeroEvaluaciones){
                    $rellenar = $numeroEvaluaciones - $cont;
                    for ($i=0; $i <$rellenar ; $i++) {
                      ?>
                      <td><center><?php echo 0?></center></td>
                      <?php
                    }
                  }?>
            <td>
              <center>
                <?php
                $prom =  round(array_sum($notas),1);
                echo $prom;
                ?>
              </center>
            </td>
            <td>
              <center>
                <?php
                if ($prom >=4 ){
                  ?>
                  <span class="label label-primary">Aprobado</span>
                  <?php
                } else {
                  ?>
                  <span class="label label-danger">Reprobado</span>
                  <?php
                }
                ?>
              </center>
            </td>
          </tr>
          <?php
        }
        ?>


      </table>
    </div>


    <!--input type="button" id="btnExport2" value=" Export Table data into Excel " /-->
    <button  id="btnExport2" class="btn btn-sm btn-success">
      Exportar notas a Excel <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
    </button>
    <?php
  }

  ?>

  <?php
}
?>


<script>
  $("#btnExport2").click(function(e) {
    window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvData2').html()));
    e.preventDefault();
  });
</script>