<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstructurEqSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estructur-eq-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idestructur_eq') ?>

    <?= $form->field($model, 'radio_idradio') ?>

    <?= $form->field($model, 'estructura_idestructura') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'observacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
