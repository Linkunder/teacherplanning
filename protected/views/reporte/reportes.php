<?php
/* @var $this AnotacionController */
/* @var $model Anotacion */

$this->breadcrumbs=array(
	'Reportes'=>array('index'),
  );?>

  <div class="btn-group btn-group-justified">
    <a href="#" class="btn btn-primary col-sm-3">
      <strong><h2><i class="glyphicon glyphicon-book"></i>&nbsp;12</h2></strong>
      Cursos
    </a>
    <a href="#" class="btn btn-primary col-sm-3">
     <strong><h2><i class="glyphicon glyphicon-user"></i>&nbsp;12</h2></strong>
     Alumnos
   </a>
   <a href="#" class="btn btn-primary col-sm-3">
    <strong><h2><i class="  glyphicon glyphicon-alert"></i>&nbsp;12</h2></strong>
    Anotaciones
  </a>
  <a href="#" class="btn btn-primary col-sm-3">
    <strong><h2><i class="glyphicon glyphicon-pencil"></i>&nbsp;12</h2></strong>
    Evaluaciones
  </a>
</div>
</br></br>

<div class="container-fluid">
  <h2>Gráficos</h2>
  <div class="row">
    <div class="col-md-12">
      <div class="panel-group" id="panel-72128">
        <div class="panel panel-default">
          <div class="panel-heading">
            <a class="panel-title" data-toggle="collapse" data-parent="#panel-72128" href="#panel-element-489495">Cursos</a>
          </div>
          <div id="panel-element-489495" class="panel-collapse collapse">
            <div class="panel-body">
            <div class="block center">
            <?php $this->renderPartial('_graficosCursos')?>
            </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
           <a class="panel-title" data-toggle="collapse" data-parent="#panel-72128" href="#panel-element-348463">Alumnos</a>
         </div>
         <div id="panel-element-348463" class="panel-collapse collapse">
          <div class="panel-body">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>



  <script src='<?php echo Yii::app()->request->baseUrl;?>/themes/kongoon/assets/js/highcharts.js'></script>.
  <script src='<?php echo Yii::app()->request->baseUrl;?>/themes/kongoon/assets/js/exporting.js'></script>
