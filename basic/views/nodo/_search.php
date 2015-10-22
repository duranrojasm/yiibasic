<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NodoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nodo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idnodo') ?>

    <?= $form->field($model, 'estacion_idestacion') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'identificacion') ?>

    <?php // echo $form->field($model, 'contacto_red') ?>

    <?php // echo $form->field($model, 'contacto_mant') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
