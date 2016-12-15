<h4><?php echo end($evaluacion)->nombre ?></h4>


<form method="post" action="?r=evaluacion/registrarNotas" >
<input type="text" name="idEvaluacion" value="<?php echo end($evaluacion)->idEvaluacion?>" hidden>
      <table class="table table-bordered table-responsive">
            <tr class="bg-primary">
                <th width="10%">Alumno</th>
                <th width="10%">Nota</th>
          </tr>

          <?php
          $contador = 0;
          foreach ($alumnosCurso as $key ) {
            ?>
            <tr>
                  <td><?php echo $key->nombre." ".$key->apellido?></td>
                  <td>

                        
                        <input type="number" name="notaAlumno<?php echo $key->idAlumno?>" min="1" max="7" step="0.1" >    


                  </td>
            </tr>
            <?php
            $contador++;
      }
      ?>


</table>

<input name="numeroAlumnos" value="<?php echo $contador?>" hidden >
<div class="modal-footer">
      <button type="submit" class="btn btn-primary">
            Listo <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
      </button>
</div>

</form>

<script type="text/javascript">





</script>