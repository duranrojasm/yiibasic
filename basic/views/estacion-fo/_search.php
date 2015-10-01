<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstacionFoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estacion-fo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idestacion_fo') ?>

    <?= $form->field($model, 'nodo_idnodo') ?>

    <?= $form->field($model, 'fibra_optica_idfibra_optica') ?>

    <?= $form->field($model, 'estacion_idestacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
