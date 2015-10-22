<?php

use yii\helpers\Html;
use app\models\Estacion;
use app\models\Rol;
use yii\widgets\MaskedInput;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\date\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
$data =  ArrayHelper::map(Estacion::find()->all(),'idestacion','nombre');
$data2 =  ArrayHelper::map(Rol::find()->all(),'idrol','nombre');
?>

<div class="usuario-form">

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


    <?= $form->field($model, 'estacion_idestacion')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Selecciona una estación ...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
       
    ])->label('Estación');
    ?> 

      <?= $form->field($model, 'rol_idrol')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data2,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Selecciona un rol ...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
       
    ])->label('Rol');
    ?> 

    
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,'placeholder' => 'Ej. Carlos Alberto'])->label('Nombres'); ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true,'placeholder' => 'Ej. Perez'])->label('Apellidos'); ?>

    <?= $form->field($model, 'cedula')->textInput(['maxlength' => true,'placeholder' => 'Ej. 5678495'])->label('Cédula'); ?>

    <?= $form->field($model, 'num_sap')->textInput(['maxlength' => true,'placeholder' => 'Ej. 110799'])->label('#SAP'); ?>

    <?= $form->field($model, 'carnet')->widget(MaskedInput::className(), [
    'mask' => '999-999',
    ])->label('#Carnet'); ?>

    <?= $form->field($model, 'telefono_cel')->widget(MaskedInput::className(), [
    'mask' => '(9999)-999-9999',
    ])->label('Telf Celular'); ?>

     </div> 
     <div style="width:40%;float:right;padding-right:5%;top:196px;position: absolute;right:150px">

     <?= $form->field($model, 'telefono_hab')->widget(MaskedInput::className(), [
    'mask' => '(9999)-999-9999',
    ])->label('Telf Habitación'); ?>
    

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true,'placeholder' => 'Ej. Tec. Avanzado TX'])->label('Cargo'); ?>

     <?= $form->field($model, 'correo')->widget(MaskedInput::className(), [
     'name' => 'correo',
    'clientOptions' => [
        'alias' =>  'email'
    ],
    ])->label('Correo'); ?>

    
    <?= $form->field($model, 'gerencia_general')->textInput(['maxlength' => true,'placeholder' => 'Ej. Gerencia General'])->label('G. General'); ?>

    <?= $form->field($model, 'gerencia')->textInput(['maxlength' => true,'placeholder' => 'Ej. Gerencia'])->label('Gerencia');?>

    <?= $form->field($model, 'departamento')->textInput(['maxlength' => true,'placeholder' => 'Ej. Transmisión'])->label('Departamento'); ?>

   
      <?= $form->field($model, 'disponibilidad')->widget(SwitchInput::classname(), [
    'pluginOptions'=>[
    'handleWidth'=>80,
    'onText'=>'Disponible',
    'offText'=>'Ocupado',
    'onColor' => 'success',
    'offColor' => 'danger',
    ]
    ])->label('Disponibilidad'); ?>

   

    </div> 

     <div style="width:50%;float:left;padding-right:115%;top:530px;position: absolute;left:640px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
