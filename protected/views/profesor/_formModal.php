<?php
/**
 * Created by PhpStorm.
 * User: Matias
 * Date: 15-12-16
 * Time: 6:07
 */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'anotacion-form',
        'enableAjaxValidation'=>false,
        'action' =>'/teacherplanning/index.php?r=profesor/create',
    )); ?>

    <p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'nombre'); ?>
        <?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
        <?php echo $form->error($model,'nombre'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'apellido'); ?>
        <?php echo $form->textField($model,'apellido',array('size'=>45,'maxlength'=>45)); ?>
        <?php echo $form->error($model,'apellido'); ?>
    </div>

    <div class="row" hidden>
        <?php echo $form->labelEx($model,'rut'); ?>
        <?php echo $form->numberField($model, 'rut'); ?>
        <?php echo $form->error($model,'rut'); ?>
    </div>

    <div class="row" hidden>
        <?php echo $form->labelEx($model,'mail'); ?>
        <?php echo $form->numberField($model, 'mail'); ?>
        <?php echo $form->error($model,'mail'); ?>
    </div>

    <div class="row" hidden>
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->numberField($model, 'password'); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <input type="number" name="modal" value="1" hidden />


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
