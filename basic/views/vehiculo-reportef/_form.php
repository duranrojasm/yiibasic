<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehiculoReportef */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculo-reportef-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vehiculo_idvehiculo')->textInput() ?>

    <?= $form->field($model, 'reporte_falla_idreporte_falla')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
