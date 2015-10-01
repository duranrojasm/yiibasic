<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquipoGeneralSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipo-general-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idequipo_general') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'serial') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
