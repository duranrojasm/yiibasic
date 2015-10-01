<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioImpSegdadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-imp-segdad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'implemento_segurd_idimplemento_segurd') ?>

    <?= $form->field($model, 'usuario_idusuario') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'cantidad_req') ?>

    <?= $form->field($model, 'cantidad_tiene') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
