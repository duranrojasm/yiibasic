<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RadioCarac */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="radio-carac-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'caracteristicasrad_idcaracteristicas')->textInput() ?>

    <?= $form->field($model, 'radio_idradio')->textInput() ?>

    <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valorrau')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inspeccion_idinspeccion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
