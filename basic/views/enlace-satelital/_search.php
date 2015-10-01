<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EnlaceSatelitalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enlace-satelital-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idenlace_satelital') ?>

    <?= $form->field($model, 'torre_idtorre') ?>

    <?= $form->field($model, 'cliente_idcliente') ?>

    <?= $form->field($model, 'estacion_idestacion') ?>

    <?= $form->field($model, 'codigo') ?>

    <?php // echo $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'num_antena') ?>

    <?php // echo $form->field($model, 'periodo_mantenimiento') ?>

    <?php // echo $form->field($model, 'estatus') ?>

    <?php // echo $form->field($model, 'ubicacion_disp') ?>

    <?php // echo $form->field($model, 'estacion_idestaciondos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
