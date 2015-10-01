<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HerramientaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="herramienta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idherramienta') ?>

    <?= $form->field($model, 'usuario_idusuario') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'uso') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
