<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstructurEq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estructur-eq-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'radio_idradio')->textInput() ?>

    <?= $form->field($model, 'estructura_idestructura')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
