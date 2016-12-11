<?php
/* @var $this AnotacionController */
/* @var $model Anotacion */

$this->breadcrumbs=array(
	'Calendario'=>array('index'),
);?>



    <!-- Container -->
    <div class="container">
      <ul  id="control" class="nav nav-tabs nav-justified">
        <li><a id="c1" class="c1" data-toggle="tab" href="#menu1">Clases</a></li>
        <li><a id="c2" class="c2" data-toggle="tab" href="#menu2">Evaluaciones</a></li>
      </ul>

      <div class="tab-content">
        <!-- Tab Mis desafios -->
        <div id="menu1" class="tab-pane fade">
          <div class="col-md-12">
            <br>
				<?php $this->renderPartial('_calendarioCursos', array('cursos'=>$cursos, 'horarios' => $horarios,)); ?>


      	 </div>
      	</div>
     
 		
        <!-- Tab Mis desafios -->
        <div id="menu2" class="tab-pane fade">
          <div class="col-md-12">
            <br>
				<?php $this->renderPartial('_calendarioEvaluaciones', array('cursos'=>$cursos,));?>
			

      	 </div>
      	</div>
 



	</div>

    <!-- / Fin Container -->

    <script type="text/javascript">

    $('#control').on('shown.bs.tab', function () {
     	var x = document.getElementsByClassName("fc-today-button");
         x[0].click();
	})
    $('#control').on('shown.bs.tab', function () {

     	var x = document.getElementsByClassName("fc-today-button");
         x[1].click();

	})

      	
      
    </script>

