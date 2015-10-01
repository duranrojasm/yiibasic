<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inspeccion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspeccion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nodo_idnodo')->textInput() ?>

    <?= $form->field($model, 'estacion_idestacion')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ptos_referencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_asig')->textInput() ?>

    <?= $form->field($model, 'fecha_insp')->textInput() ?>

    <?= $form->field($model, 'estatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'radio_idradio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
