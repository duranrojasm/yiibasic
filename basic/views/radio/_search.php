<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RadioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="radio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idradio') ?>

    <?= $form->field($model, 'modelo_idmodelo') ?>

    <?= $form->field($model, 'estacion_idestacion') ?>

    <?= $form->field($model, 'observaciones') ?>

    <?= $form->field($model, 'posicion_fisica') ?>

    <?php // echo $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'marca') ?>

    <?php // echo $form->field($model, 'serial') ?>

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
