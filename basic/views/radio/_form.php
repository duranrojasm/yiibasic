<?php

use kartik\helpers\Html;
use app\models\Modelo;
use app\models\Estructura;
use app\models\Estacion;
use yii\widgets\MaskedInput;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\date\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Radio */
/* @var $form yii\widgets\ActiveForm */
$data =  ArrayHelper::map(Modelo::find()->all(),'idmodelo','nombre');
$data1 =  ArrayHelper::map(Estacion::find()->where(['!=','idestacion','1'])->all(),'idestacion','nombre');
$data3 =  ArrayHelper::map(Estructura::find()->where(['!=','idestructura','1'])->all(),'idestructura','nombre');
?>

<div class="radio-form">

    

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


    <?= $form->field($model, 'modelo_idmodelo')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Seleccione un modelo ...'],
        'pluginOptions' => [
                'allowClear' => true,
               
        ],
      
    ])->label('Modelo');?>

    <?= $form->field($model, 'estacion_idestacion')->dropDownList($data1, 
             ['prompt'=>'Seleccione una estación',
                'id'=>'origen',
             
              'onchange'=>'
                $.post( "index.php?r=radio/lists&id='.'"+$(this).val(), function( data ) {
                  $( "select#hola" ).html( data );
                });
            '])->label('Estación');?>

       <?= $form->field($estruc, 'estructura_idestructura')->dropDownList($data3, 
             ['id'=>'hola',
             'prompt'=>'Seleccione la estructura'
             ])->label('Pertenencia');?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true])->label('Observaciones'); ?>

    <?= $form->field($model, 'posicion_fisica')->textInput(['maxlength' => true])->label('Posición Física'); ?>

 

    <?= $form->field($estruc, 'fecha')->widget(DatePicker::classname(), [
            'language' => 'es',    
            'options' => ['placeholder' => 'Fecha de posición...'],
            'pluginOptions' => [
                'format' => 'dd-M-yyyy',
                'autoclose'=>true
            ]
        ])->label('Fecha de Posición'); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('Nombre'); ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true])->label('Marca'); ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true])->label('Serial'); ?>

    <?= $form->field($model, 'periodo_mantenimiento')->textInput(['placeholder' => 'Cantidad en días...'])->label('Tiempo Mantenimiento'); ?>

   <!-- <?= $form->field($model, 'estatus')->textInput(['maxlength' => true]) ?> -->
    
    <?= $form->field($model, 'ubicacion_disp')->textInput(['maxlength' => true])->label('Ubicación'); ?>

    <?= $form->field($model, 'estacion_idestaciondos')->dropDownList($data1, 
             ['prompt'=>'Seleccione una estación',
               'id'=>'destino' 
             
            ])->label('Estación Conexión');?>

     </div>

    <div style="width:50%;float:left;padding-right:115%;top:10px;position: relative;left:150px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

 
 <?php
$script = <<< JS
    $(document).ready(function () {
    prevOrigin = "";
    prevDestination = "";
    $('#origen').change(function() {
        var selected = $(":selected",this).text();
        $('#destino option:contains("' + prevOrigin +'")').removeAttr("disabled");
        $('#destino option:contains("' + selected +'")').attr("disabled","disabled");
        prevOrigin = selected;
    });
    
    $('#destino').change(function() {
        var selected = $(":selected",this).text();
        $('#origen option:contains("' + prevDestination +'")').removeAttr("disabled");
        $('#origen option:contains("' + selected +'")').attr("disabled","disabled");
        prevDestination = selected;
    });
});
JS;
$this->registerJs($script); 
?>