<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HiloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hilo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idhilo') ?>

    <?= $form->field($model, 'fibra_idfibra_optica') ?>

    <?= $form->field($model, 'numhilo') ?>

    <?= $form->field($model, 'ttodest') ?>

    <?= $form->field($model, 'ab') ?>

    <?php // echo $form->field($model, 'sist') ?>

    <?php // echo $form->field($model, 'band') ?>

    <?php // echo $form->field($model, 'odf') ?>

    <?php // echo $form->field($model, 'observ') ?>

    <?php // echo $form->field($model, 'des_esp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
