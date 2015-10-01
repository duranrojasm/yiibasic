<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioEquimedi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-equimedi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'equipo_general_idequipo_general')->textInput() ?>

    <?= $form->field($model, 'usuario_idusuario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
