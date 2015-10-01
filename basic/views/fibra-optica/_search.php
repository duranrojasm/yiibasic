<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FibraOpticaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fibra-optica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idfibra_optica') ?>

    <?= $form->field($model, 'nodo_idnodo') ?>

    <?= $form->field($model, 'estacion_idestacion') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'distancia') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <?php // echo $form->field($model, 'periodo_mantenimiento') ?>

    <?php // echo $form->field($model, 'estacion_idestaciondos') ?>

    <?php // echo $form->field($model, 'nodo_idnododos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
