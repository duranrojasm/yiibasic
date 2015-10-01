<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstacionFo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estacion-fo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nodo_idnodo')->textInput() ?>

    <?= $form->field($model, 'fibra_optica_idfibra_optica')->textInput() ?>

    <?= $form->field($model, 'estacion_idestacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
