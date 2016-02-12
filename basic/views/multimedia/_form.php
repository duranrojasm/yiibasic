<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use app\models\Inspeccion;



/* @var $this yii\web\View */
/* @var $model app\models\Multimedia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="multimedia-form">

    <?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data']
            ]); ?>

    <?= $form->field($model, 'detalle_proyecto_iddetalle_proyecto')->textInput() ?>

    <?= $form->field($model, 'inspeccion_idinspeccion')->textInput() ?>

    <?= $form->field($model, 'estacion_idestacion')->textInput() ?>

    <?= $form->field($model, 'nodo_idnodo')->textInput() ?>

    

    

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
