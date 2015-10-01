<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EnlaceSatelital */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enlace-satelital-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'torre_idtorre')->textInput() ?>

    <?= $form->field($model, 'cliente_idcliente')->textInput() ?>

    <?= $form->field($model, 'estacion_idestacion')->textInput() ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_antena')->textInput() ?>

    <?= $form->field($model, 'periodo_mantenimiento')->textInput() ?>

    <?= $form->field($model, 'estatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ubicacion_disp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estacion_idestaciondos')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
