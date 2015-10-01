<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquipoGeneralCaracSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipo-general-carac-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idequipo_general_carac') ?>

    <?= $form->field($model, 'caractersticas_em_idcaractersticas_em') ?>

    <?= $form->field($model, 'equipo_general_idequipo_general') ?>

    <?= $form->field($model, 'valor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
