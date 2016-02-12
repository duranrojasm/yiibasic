<?php

use kartik\helpers\Html;
use app\models\TipoEstructura;
use app\models\Estacion;
use app\models\Estructura;
use yii\widgets\MaskedInput;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\date\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Estructura */
/* @var $form yii\widgets\ActiveForm */
$data2 =  ArrayHelper::map(TipoEstructura::find()->all(),'idtipo_estructura','nombre');
$data1 =  ArrayHelper::map(Estacion::find()->where(['!=','idestacion','1'])->all(),'idestacion','nombre');
$data3 =  ArrayHelper::map(Estructura::find()->all(),'idestructura','nombre');
?>
 
<div class="estructura-form">

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

      <?= $form->field($model, 'tipo_estructura_idtipo_estructura')->dropDownList($data2, 
             ['prompt'=>'Seleccione un tipo',
              'id'=>'tipestructura'

      ])->label('Tipo');?>  

    <?= $form->field($model, 'estacion_idestacion')->dropDownList($data1, 
             ['prompt'=>'Seleccione una estación',
              'id'=> 'estacion',
             'onchange'=>'$.post( "index.php?r=estructura/lista&id='.'"+$(this).val(), function( data ) {
                          $( "#estructura" ).html( data );
                          });'
          
              
            ])->label('Estación');?>

  

    <?= $form->field($model, 'estructura_idestructura')->dropDownList($data3, 
             ['prompt'=>'Seleccione una estructura',
                'id'=>'estructura',
            
             ])->label('Pertenencia');?>


    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true])->label('Código'); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('Nombre'); ?>

    <?= $form->field($model, 'cantidad')->textInput()->label('Cantidad de Estructura'); ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true])->label('Observación'); ?>


</div>

  <div style="width:50%;float:left;padding-right:115%;top:10px;position: relative;left:150px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

 <?php
$script = <<< JS

$(document).ready(function() {
var tipoDropdown;
var aux;
 $('#tipestructura').change(function () {
     tipoDropdown = $(this).val();
     
  
    if(tipoDropdown == '2')
      {
       
          $('#estructura').prop("disabled", true);
      }
    else
    {
        $('#estructura').prop("disabled", false);

        if(tipoDropdown == '1')
        {
          aux='2';
        }
        else if(tipoDropdown == '3')
        {
          aux='1';
        }  

    }

           
});
$('#estacion').change(function () {
 // var a = $(this).val();
 // $.post( "index.php?r=estructura/lista&id='.'"+$(this).val(), function( data ) {
 //  $( "#estructura" ).html( data );
 //  });  
      
      
});  

}); 
JS;
$this->registerJs($script); 
?>
