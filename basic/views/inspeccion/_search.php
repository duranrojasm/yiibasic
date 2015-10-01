<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InspeccionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspeccion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idinspeccion') ?>

    <?= $form->field($model, 'nodo_idnodo') ?>

    <?= $form->field($model, 'estacion_idestacion') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'ptos_referencia') ?>

    <?php // echo $form->field($model, 'fecha_asig') ?>

    <?php // echo $form->field($model, 'fecha_insp') ?>

    <?php // echo $form->field($model, 'estatus') ?>

    <?php // echo $form->field($model, 'radio_idradio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
