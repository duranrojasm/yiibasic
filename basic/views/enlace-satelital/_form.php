<?php

use kartik\helpers\Html;
use app\models\Nodo;
use app\models\Torre;
use app\models\Cliente;
use app\models\Estacion;
use yii\widgets\MaskedInput;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\date\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\FibraOptica */
/* @var $form yii\widgets\ActiveForm */
$data =  ArrayHelper::map(Torre::find()->all(),'idtorre','codigo');
$data2 =  ArrayHelper::map(Cliente::find()->all(),'idcliente','nombre');
$data3 =  ArrayHelper::map(Estacion::find()->where(['!=','idestacion','1'])->all(),'idestacion','nombre');

?>

<div class="enlace-satelital-form">

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

     <?= $form->field($model, 'estacion_idestacion')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data3,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Seleccione Estación...','id'=>'origenl'],
        'pluginOptions' => [
                'allowClear' => true,
               
        ],
      
    ])->label('Estación');?>

   

       <?= $form->field($model, 'torre_idtorre')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Seleccione Torre...'],
        'pluginOptions' => [
                'allowClear' => true,
               
        ],
      
    ])->label('Torre');?>

  
    <?= $form->field($model, 'cliente_idcliente')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data2,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Seleccione Cliente...'],
        'pluginOptions' => [
                'allowClear' => true,
               
        ],
      
    ])->label('Cliente');?>
    

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true])->label('Código'); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('Nombre'); ?>

    <?= $form->field($model, 'num_antena')->textInput()->label('Número Antena'); ?>

    <?= $form->field($model, 'periodo_mantenimiento')->textInput(['placeholder' => 'Cantidad en días...'])->label('Período Mantenimento'); ?>

    <?= $form->field($model, 'ubicacion_disp')->textInput(['maxlength' => true])->label('Ubicación Disp'); ?>

 
         <?= $form->field($model, 'estacion_idestaciondos')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data3,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Seleccione Estación ...','id'=>'destenl'],
        'pluginOptions' => [
                'allowClear' => true,
               
        ],
      
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
    $('#origenl').change(function() {
        var selected = $(":selected",this).text();
      
        $('#destenl option:contains("' + prevOrigin +'")').removeAttr("disabled");
        $('#destenl option:contains("' + selected +'")').attr("disabled","disabled");
        prevOrigin = selected;
    });
    
    $('#destenl').change(function() {
        var selected = $(":selected",this).text();
         
        $('#origenl option:contains("' + prevDestination +'")').removeAttr("disabled");
        $('#origenl option:contains("' + selected +'")').attr("disabled","disabled");
        prevDestination = selected;
    });
  });
JS;
$this->registerJs($script); 
?>