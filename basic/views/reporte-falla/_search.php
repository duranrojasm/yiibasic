<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReporteFallaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reporte-falla-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idreporte_falla') ?>

    <?= $form->field($model, 'coordenada_idcoordenada') ?>

    <?= $form->field($model, 'falla_idfalla') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'ptos_referencia') ?>

    <?php // echo $form->field($model, 'fecha_inicio') ?>

    <?php // echo $form->field($model, 'fecha_fin') ?>

    <?php // echo $form->field($model, 'estatus') ?>

    <?php // echo $form->field($model, 'distancia') ?>

    <?php // echo $form->field($model, 'urgencia') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
