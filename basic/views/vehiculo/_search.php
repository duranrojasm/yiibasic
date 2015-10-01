<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehiculoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idvehiculo') ?>

    <?= $form->field($model, 'control') ?>

    <?= $form->field($model, 'placa') ?>

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'modelo') ?>

    <?php // echo $form->field($model, 'ano') ?>

    <?php // echo $form->field($model, 'unidad') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'aviso') ?>

    <?php // echo $form->field($model, 'obser_aviso') ?>

    <?php // echo $form->field($model, 'fecha') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
