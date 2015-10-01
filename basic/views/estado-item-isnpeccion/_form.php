<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoItemIsnpeccion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-item-isnpeccion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inspeccion_idinspeccion')->textInput() ?>

    <?= $form->field($model, 'item_iditem')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'descrip_novedades')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado_items')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor_potencia_volt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
