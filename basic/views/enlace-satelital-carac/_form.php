<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EnlaceSatelitalCarac */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enlace-satelital-carac-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'caracteristica_es_idcaracteristica')->textInput() ?>

    <?= $form->field($model, 'enlace_satelital_idenlace_satelital')->textInput() ?>

    <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
