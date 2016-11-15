<?php
/**
 * Created by PhpStorm.
 * User: Matias
 * Date: 15-11-16
 * Time: 0:45
 */
?>


<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'clase-form',
        'enableAjaxValidation'=>false,
    )); ?>


    <?php echo $form->errorSummary($model); ?>


    <div class="row">
        <?php echo $form->labelEx($model,'descripcion'); ?>
        <?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'descripcion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'idCurso'); ?>
        <?php
        //echo $form->textField($model,'idCurso');
        $lista = CHtml::listData($todosLosCursos, 'idCurso','nombre','institucion');
        echo $form->dropDownList($model,'idCurso',$lista,array('prompt'=>'Seleccione un curso'));

        ?>
        <?php echo $form->error($model,'idCurso'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
    </div>


    <?php $this->endWidget(); ?>
</div><!-- form -->