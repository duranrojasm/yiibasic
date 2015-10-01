<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PartesEsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partes-es-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpartes_es') ?>

    <?= $form->field($model, 'enlace_satelital_idenlace_satelital') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'serial') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
