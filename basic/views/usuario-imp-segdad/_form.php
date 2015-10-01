<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioImpSegdad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-imp-segdad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'implemento_segurd_idimplemento_segurd')->textInput() ?>

    <?= $form->field($model, 'usuario_idusuario')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'cantidad_req')->textInput() ?>

    <?= $form->field($model, 'cantidad_tiene')->textInput() ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
