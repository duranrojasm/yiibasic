<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RadioCaracSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="radio-carac-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'caracteristicasrad_idcaracteristicas') ?>

    <?= $form->field($model, 'radio_idradio') ?>

    <?= $form->field($model, 'valor') ?>

    <?= $form->field($model, 'valorrau') ?>

    <?= $form->field($model, 'inspeccion_idinspeccion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
