

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
<?php var_dump($evaluaciones);


	var_dump($horarios);




?>



      

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
      events: [
      {
					title: 'All Day Event',
					start: '2016-12-12'
				},
				
        ]
      });



  });
</script>
