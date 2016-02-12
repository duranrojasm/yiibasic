<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

      <?php $form = ActiveForm::begin(['id'=>$model->formName(),
            'type' => ActiveForm::TYPE_VERTICAL,
            'options' => ['data-pjax' => true ],
            'formConfig' => [
                'labelSpan' => 2, 
                'deviceSize' => ActiveForm::SIZE_SMALL,
                'showErrors' => true,
                
               //'showLabels'=>ActiveForm::SCREEN_READER
                ]
            //'fullSpan'=>12

    ]); ?>

   <div style="width:50%;padding-right:10%;top:30px;position: relative;left:100px">

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('Nombre') ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true])->label('Dirección') ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true])->widget(MaskedInput::className(), [
    'mask' => '(999)-999-9999',
    ])->label('Teléfono') ?>

    <?= $form->field($model, 'edificio')->textInput(['maxlength' => true])->label('Edificio') ?>

    <?= $form->field($model, 'piso')->textInput(['maxlength' => true])->label('Piso') ?>

    </div> 

   <div style="width:50%;float:left;padding-right:115%;top:60px;position: relative;left:150px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
