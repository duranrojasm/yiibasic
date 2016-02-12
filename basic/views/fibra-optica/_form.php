<?php

use kartik\helpers\Html;
use app\models\Nodo;
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
$data2 =  ArrayHelper::map(Nodo::find()->all(),'idnodo','nombre');
<<<<<<< HEAD
$items = ['1'=> '1', '2'=>'2','3'=>'3','4'=> '4', '5'=>'5','6'=>'6','7'=> '7', '8'=>'8','9'=>'9','10'=> '10', '11'=>'11','12'=>'12',
'13'=> '13', '14'=>'14','15'=>'15','16'=> '16', '17'=>'17','18'=>'18','19'=> '19', '20'=>'20','21'=>'21','22'=> '22', '23'=>'23','24'=>'24',
'25'=> '25', '26'=>'26','27'=>'27','28'=> '28', '29'=>'29','30'=>'30','31'=> '31', '32'=>'32','33'=>'33','34'=> '34', '35'=>'35','36'=>'36',
'37'=> '37', '38'=>'38','39'=>'39','40'=> '40', '41'=>'41','42'=>'42','43'=> '43', '44'=>'44','45'=>'45','46'=> '46', '47'=>'47','48'=>'48',
];

=======
$data =  ArrayHelper::map(Estacion::find()->where(['!=','idestacion','1'])->all(),'idestacion','nombre');
>>>>>>> origin/master
?>

<div class="fibra-optica-form">

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
        
        'data' =>$data,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Seleccione una estación...','id' => 'origest'],
        'pluginOptions' => [
                'allowClear' => true
        ],
      
    ])->label('Estación Orig'); ?>

        <?= $form->field($model, 'estacion_idestaciondos')->widget(Select2::classname(), [
        
        'data' =>$data,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Seleccione una estación...','id' => 'destest'],
        'pluginOptions' => [
                'allowClear' => true
        ],
      
    ])->label('Estación Dest'); ?>

        <?= $form->field($model, 'nodo_idnodo')->widget(Select2::classname(), [
       
        'data' =>$data2,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Seleccione un nodo...','id' => 'orignod'],
        'pluginOptions' => [
                'allowClear' => true
        ],
      
    ])->label('Nodo Orig'); ?>

        <?= $form->field($model, 'nodo_idnododos')->widget(Select2::classname(), [
       
        'data' =>$data2,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Seleccione un nodo...','id' => 'destnod'],
        'pluginOptions' => [
                'allowClear' => true
        ],
      
    ])->label('Nodo Dest'); ?>


    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,'placeholder' => 'Ej. SJK-LFR'])->label('Nombre'); ?>

    <?= $form->field($model, 'distancia')->textInput(['maxlength' => true,'placeholder' => 'Ej. 48'])->label('Distancia (Km)'); ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true,'placeholder' => 'Ej. Tiene 8 clientes'])->label('Observación'); ?>

    <?= $form->field($model, 'periodo_mantenimiento')->textInput(['maxlength' => true,'placeholder' => 'Ej. 6'])->label('Tiempo Mantenimiento'); ?>

 

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
    $('#origest').change(function() {
        var selected = $(":selected",this).text();
         $('#orignod').prop("disabled", true);
        $('#destest option:contains("' + prevOrigin +'")').removeAttr("disabled");
        $('#destest option:contains("' + selected +'")').attr("disabled","disabled");
        prevOrigin = selected;
    });
    
    $('#destest').change(function() {
        var selected = $(":selected",this).text();
          $('#destnod').prop("disabled", true);
        $('#origest option:contains("' + prevDestination +'")').removeAttr("disabled");
        $('#origest option:contains("' + selected +'")').attr("disabled","disabled");
        prevDestination = selected;
    });

    $('#orignod').change(function() {
        var selected = $(":selected",this).text();
         $('#origest').prop("disabled", true);
        $('#destnod option:contains("' + prevOrigin +'")').removeAttr("disabled");
        $('#destnod option:contains("' + selected +'")').attr("disabled","disabled");
        prevOrigin = selected;
    });
    
    $('#destnod').change(function() {
        var selected = $(":selected",this).text();
         $('#destest').prop("disabled", true);
        $('#orignod option:contains("' + prevDestination +'")').removeAttr("disabled");
        $('#orignod option:contains("' + selected +'")').attr("disabled","disabled");
        prevDestination = selected;
    });
});
JS;
$this->registerJs($script); 
?>
