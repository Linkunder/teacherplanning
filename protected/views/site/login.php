<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';

?>

<style type="text/css">
@import "bourbon";
body {
	background: #eee 
	!important;	
}
wrapper {	
	margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
}
</style>

<div class="wrapper">


<div class="form-signin">
<h2 class="form-signin-heading">Login</h2>
<p>Entra con tus credenciales:</p>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><span class="required">*</span>son requeridos.</p>

	<div >
		<?php echo $form->labelEx($model,'correo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div >
		<?php echo $form->labelEx($model,'contraseña'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="rememberMe ">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'recuerdame'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<!--
	<div class="btn btn-md btn-primary">
		?php echo CHtml::submitButton('Login'); ?>
	</div>
	-->
	<button type="submit" class="btn btn-md btn-primary" href="#">Ingresar</button>
	<button type="button" class="btn btn-md btn-success cp" href="#" data-toggle="modal" data-target="#modalRegistrar">Registrarse</button>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>



  <div id="modalRegistrar" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Regístrate en TeacherPlanning</h4>
        </div>
        <div class="modal-body">
          <?php
          $this->renderPartial('_formRegistrar');
          
          ?>
        </div>
      </div>

    </div>
  </div>