<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MultimediaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="multimedia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idmultimedia') ?>

    <?= $form->field($model, 'detalle_proyecto_iddetalle_proyecto') ?>

    <?= $form->field($model, 'inspeccion_idinspeccion') ?>

    <?= $form->field($model, 'estacion_idestacion') ?>

    <?= $form->field($model, 'nodo_idnodo') ?>

    <?php // echo $form->field($model, 'multimedia') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
