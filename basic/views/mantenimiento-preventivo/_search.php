<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MantenimientoPreventivoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mantenimiento-preventivo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idmantenimiento_preventivo') ?>

    <?= $form->field($model, 'fibra_optica_idfibra_optica') ?>

    <?= $form->field($model, 'equipo_general_idequipo_general') ?>

    <?= $form->field($model, 'enlace_satelital_idenlace_satelital') ?>

    <?= $form->field($model, 'radio_idradio') ?>

    <?php // echo $form->field($model, 'reporte_preven_idreporte_preven') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
