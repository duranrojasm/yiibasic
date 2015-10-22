<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CoordenadaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coordenada-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idcoordenada') ?>

    <?= $form->field($model, 'latitud') ?>

    <?= $form->field($model, 'longitud') ?>

    <?= $form->field($model, 'asnm') ?>

    <?= $form->field($model, 'reportefalla') ?>

    <?php // echo $form->field($model, 'estacion') ?>

    <?php // echo $form->field($model, 'nodo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
