<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Coordenada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coordenada-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'latitud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asnm')->textInput() ?>

    <?= $form->field($model, 'reportefalla')->textInput() ?>

    <?= $form->field($model, 'estacion')->textInput() ?>

    <?= $form->field($model, 'nodo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
