<?php
if (!empty($evaluacionesCurso)){
    ?>
    <p><strong>Instrucciones: </strong> Para agregar las notas de una evaluación, selecciona alguna y clickea la opción <button class="btn btn-xs btn-primary"  >
        Agregar notas 
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    </p>
    <div class="panel-group" id="accordion2">
        <?php 
        foreach ($evaluacionesCurso as $evaluacion){
            $idEvaluacion = $evaluacion->idEvaluacion;
            ?>
            <div class="panel panel-default" id="panel<?php echo $evaluacion->idEvaluacion;?>">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapseEval<?php echo $evaluacion->idEvaluacion;?>">
                            <?php echo $evaluacion->nombre;?>
                        </a>
                    </h4>
                </div>
                <div id="collapseEval<?php echo $evaluacion->idEvaluacion;?>" class="panel-collapse collapse">
                    <div class="panel-body">

                        <table class="table ">
                            <tr>
                                <td>ID</td>
                                <td><?= $idEvaluacion?></td>
                            </tr>
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
                            <tr>
                                <td>
                                    <center>
                                        <button id="<?php echo $idEvaluacion;?>" class="btn btn-sm btn-primary rb" data-toggle="modal" data-target="#modalAgregarNotas" data-id="<?php echo $idEvaluacion;?>" >
                                            Agregar notas 
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        </button>
                                    </center>
                                </td>
                                <td></td>
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
    ?>
    <div class="alert alert-danger">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>Ups!</strong> Este curso no registra evaluaciones.
 </div>
 <?php
}
?>




