<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ManteCorrectivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mante-correctivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reporte_falla_idreporte_falla')->textInput() ?>

    <?= $form->field($model, 'equipo_general_idequipo_general')->textInput() ?>

    <?= $form->field($model, 'enlace_satelital_idenlace_satelital')->textInput() ?>

    <?= $form->field($model, 'radio_idradio')->textInput() ?>

    <?= $form->field($model, 'fibra_optica_idfibra_optica')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
