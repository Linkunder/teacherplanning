    <?php 
      $aux="";
      $cont=0;
      foreach ($cursos as $key) {
         $aux.=$key->idCurso.",";

      }
      $_SESSION['id']=$aux;

     ?>

<!--MODAL -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cargando información</h4>
      </div>
      <div class="modal-body">
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!--Modal-->

      <style>
      #calendar2 {
        max-width: 800px;
        margin: 0 auto;
      }
      </style>
      <br/>

      <div id="calendar2">

          
      </div>



      

<!--Contenido de la pagina-->



<!--Calendario-->
<link href="<?php echo Yii::app()->request->baseUrl;?>/themes/kongoon/assets/css/fullcalendar.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->request->baseUrl;?>/themes/kongoon/assets/css/fullcalendar.print.css" rel="stylesheet" media="print" />

<script src='<?php echo Yii::app()->request->baseUrl;?>/themes/kongoon/assets/js/moment.min.js'></script>


<script src='<?php echo Yii::app()->request->baseUrl;?>/themes/kongoon/assets/js/fullcalendar.min.js'></script>
<script src='<?php echo Yii::app()->request->baseUrl;?>/themes/kongoon/assets/js/lang-all.js'></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/themes/kongoon/assets/js/locale/es.js"></script>





<script>




  $(document).ready(function() {

    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth()+1; //hoy es 0!
    var yyyy = hoy.getFullYear();

    if(dd<10) {
      dd='0'+dd
    }

    if(mm<10) {
      mm='0'+mm
    }

    hoy = mm+'-'+dd+'-'+yyyy;


    $('#calendar2').fullCalendar({  
        lang: 'es',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: hoy,
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      

      // Partidos
      eventSources: [
       
         
           
          <?php
           foreach ($cursos as $curso){

          ?>
          {
            url: '<?php echo CController::createUrl('calendario/WsDatosEvaluacionesCursos') ?>',
            type: 'POST',
            data: {
 
                idCurso: <?php echo $curso->idCurso?>
              
                
            },
            error: function() {
                alert('error al hacer request');
            },
                    //luego de recorrer los cursos se setean los colores etc
            color: 'yellow',   // a non-ajax option
            textColor: 'black' // a non-ajax option
          },
          <?php
            }
          ?>
				
        ],
            eventClick:  function(event, jsEvent, view) {
            $('#modalTitle2').html(event.title);
            $('#modalBody2').html(event.description);
            $('#calendarModal2').modal();
        },
      });



  });
</script>
<div id="calendarModal2" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">Cerrar</span></button>
            <h4 id="modalTitle2" class="modal-title"></h4>
        </div>
        <div id="modalBody2" class="modal-body"> </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
</div>