<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FibraOptica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fibra-optica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nodo_idnodo')->textInput() ?>

    <?= $form->field($model, 'estacion_idestacion')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'distancia')->textInput() ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'periodo_mantenimiento')->textInput() ?>

    <?= $form->field($model, 'estacion_idestaciondos')->textInput() ?>

    <?= $form->field($model, 'nodo_idnododos')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
