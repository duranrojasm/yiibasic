<?php


use kartik\helpers\Html;
use app\models\Localidad;
use yii\widgets\MaskedInput;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\date\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Estacion */
/* @var $form yii\widgets\ActiveForm */
$data =  ArrayHelper::map(Localidad::find()->where(['=', 'tipo', 'Municipio'])->all(),'idlocalidad','nombre');
?>

<div class="estacion-form">

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

      <div style="width:50%;padding-right:10%;top:10px;position: relative;left:100px">

     <?= $form->field($model, 'localidad_idlocalidad')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Selecciona una ubicacion ...'],
        'pluginOptions' => [
                'allowClear' => true,
                'tags' => true
        ],
       'addon' => [
        'prepend' => [
            'content' => Html::icon('globe')
        ],
        ],
    ])->label('Ubicación');
    ?> 


    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true,'placeholder' => 'Ej. 45T66'])->label('Código'); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,'placeholder' => 'Ej. La Grita'])->label('Nombre'); ?>

    <?= $form->field($model, 'tipo_central')->textInput(['maxlength' => true,'placeholder' => 'Ej. 45T66'])->label('Tipo'); ?>

     <?= $form->field($model, 'telefono')->widget(MaskedInput::className(), [
    'mask' => '9999-999-9999',
    ])->label('Telf Principal'); ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true,'placeholder' => 'Ej. Pto de Referencia'])->label('Dirección'); ?>

    <?= $form->field($model, 'distancia')->textInput(['maxlength' => true,'placeholder' => 'Ej. 13'])->label('Distancia (Km)'); ?>

    <?= $form->field($model, 'tiempo')->textInput(['maxlength' => true,'placeholder' => 'Ej. 90'])->label('Tiempo (Min)'); ?>

    <?= $form->field($coord, 'latitud')->textInput(['maxlength' => true,'placeholder' => 'Ej. 90'])->label('Latitud'); ?>

    <?= $form->field($coord, 'longitud')->textInput(['maxlength' => true,'placeholder' => 'Ej. 90'])->label('Longitud');?>

    <?= $form->field($coord, 'asnm')->textInput(['maxlength' => true,'placeholder' => 'Ej. 90'])->label('Asnm'); ?>

    </div>

  <div style="width:50%;float:left;padding-right:115%;top:10px;position: relative;left:150px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
