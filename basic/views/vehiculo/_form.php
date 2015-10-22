<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\date\DatePicker;
use kartik\widgets\SwitchInput

/* @var $this yii\web\View */
/* @var $model app\models\Vehiculo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculo-form">

    <?php $form = ActiveForm::begin(['id'=>$model->formName(),
            'type' => ActiveForm::TYPE_VERTICAL,
            'options' => ['data-pjax' => true ],
            'formConfig' => [
                'labelSpan' => 3, 
                'deviceSize' => ActiveForm::SIZE_SMALL,
                'showErrors' => true,
                
               //'showLabels'=>ActiveForm::SCREEN_READER
                ]
            //'fullSpan'=>12

    ]); ?>

    <div style="width:40%;padding-right:5%;top:16px;position: relative;left:130px">

    <?= $form->field($model, 'control')->textInput(['maxlength' => true,'placeholder' => 'Ej. 45T66'])->label('Control'); ?>

    <?= $form->field($model, 'placa')->textInput(['maxlength' => true,'placeholder' => 'Ej. 45T66'])->label('Placa'); ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true,'placeholder' => 'Ej. Toyota'])->label('Marca'); ?>

    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true,'placeholder' => 'Ej. Corola'])->label('Modelo'); ?>

    <?= $form->field($model, 'ano')->textInput(['placeholder' => 'Ej. 1992'])->label('Año'); ?>

    <?= $form->field($model, 'unidad')->textInput(['maxlength' => true,'placeholder' => 'Ej. Transmisión'])->label('Unidad'); ?>
     </div> 

   <div style="width:40%;float:right;padding-right:5%;top:196px;position: absolute;right:150px">

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true,'placeholder' => 'Ej. Táchira'])->label('Estado'); ?>

    <?= $form->field($model, 'aviso')->textInput(['maxlength' => true,'placeholder' => 'Ej. 6545600'])->label('Aviso'); ?>

    <?= $form->field($model, 'obser_aviso')->textInput(['maxlength' => true,'placeholder' => 'Ej. Caja del motor'])->label('Observación'); ?>

    <?= $form->field($model, 'fecha')->widget(DatePicker::classname(), [
    'language' => 'es',    
    'options' => ['placeholder' => 'Fecha del Aviso ...'],
    'pluginOptions' => [
        'format' => 'dd-M-yyyy',
        'autoclose'=>true
    ]
])->label('Fecha'); ?>

    <?= $form->field($model, 'estatus')->widget(SwitchInput::classname(), [
    'pluginOptions'=>[
    'handleWidth'=>80,
    'onText'=>'Disponible',
    'offText'=>'Ocupado',
    'onColor' => 'success',
    'offColor' => 'danger',
]
])->label('Disponibilidad'); ?>

</div> 

    <div style="width:50%;float:left;padding-right:115%;top:490px;position: absolute;left:640px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
