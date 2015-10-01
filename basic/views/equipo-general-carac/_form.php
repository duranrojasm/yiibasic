<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquipoGeneralCarac */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipo-general-carac-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'caractersticas_em_idcaractersticas_em')->textInput() ?>

    <?= $form->field($model, 'equipo_general_idequipo_general')->textInput() ?>

    <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
