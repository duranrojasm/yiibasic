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

<<<<<<< HEAD
    <?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data']
            ]); ?>
=======
    <?php $form = ActiveForm::begin('options' => ['enctype'=>'multipart/form-data']); ?>
>>>>>>> origin/master

    <?= $form->field($model, 'detalle_proyecto_iddetalle_proyecto')->textInput() ?>

    <?= $form->field($model, 'inspeccion_idinspeccion')->textInput() ?>

    <?= $form->field($model, 'estacion_idestacion')->textInput() ?>

    <?= $form->field($model, 'nodo_idnodo')->textInput() ?>

<<<<<<< HEAD
    

    
=======
    <?= $form->field($model, 'multimedia')->textInput(['maxlength' => true]) ?>
>>>>>>> origin/master

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
