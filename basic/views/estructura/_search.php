<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstructuraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estructura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idestructura') ?>

    <?= $form->field($model, 'estacion_idestacion') ?>

    <?= $form->field($model, 'tipo_estructura_idtipo_estructura') ?>

    <?= $form->field($model, 'estructura_idestructura') ?>

    <?= $form->field($model, 'codigo') ?>

    <?php // echo $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'cantidad') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
