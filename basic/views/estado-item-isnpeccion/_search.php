<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoItemIsnpeccionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-item-isnpeccion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'inspeccion_idinspeccion') ?>

    <?= $form->field($model, 'item_iditem') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'descrip_novedades') ?>

    <?= $form->field($model, 'estado_items') ?>

    <?php // echo $form->field($model, 'valor_potencia_volt') ?>

    <?php // echo $form->field($model, 'valor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
