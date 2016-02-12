<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FibraOpticaCarac */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fibra-optica-carac-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'caracteristica_fo_idcaracteristica')->textInput() ?>

    <?= $form->field($model, 'hilo_idhilo')->textInput() ?>

    <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
