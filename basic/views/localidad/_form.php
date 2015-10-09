<?php

//use yii\helpers\Html;
use kartik\helpers\Html;
//use kartik\widgets\ActiveForm;
//use kartik\widgets\ActiveField;
use app\models\Localidad;
use kartik\select2\Select2;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use yii\helpers\ArrayHelper;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;

/* @var $this yii\web\View */
/* @var $model app\models\Localidad */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
 
//$this->registerJs(
 //  '$("document").ready(function(){ 
//        $("#nuevo").on("pjax:end", function() {
//            $.pjax.reload({container:"#localGrid"});  //Reload GridView
//        });
//    });'
//);
$data =  ArrayHelper::map(Localidad::find()->all(),'idlocalidad','nombre');
$data2 = ['Region'=> 'Region', 'Estado'=>'Estado','Municipio'=>'Municipio'];
?>


<div class="localidad-form">



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




   

     <div style="width:45%;float:left;padding-right:0%" >

    
    <?= $form->field($model, 'localidad_idlocalidad')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Selecciona una ubicacion ...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
       'addon' => [
        'prepend' => [
            'content' => Html::icon('globe')
        ],
        ],
    ])->label('Ubicación');
    ?> 

  </div>


    <div style="width:50%;padding-right:5%;top:16px;position: relative">
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('Nombre'); ?>
     </div> 

     <div style="width:50%;padding-right:5%;top:30px;position: relative">
    <?= $form->field($model, 'tipo')->widget(Select2::classname(), [
        'data' =>$data2,
         'theme' => Select2::THEME_KRAJEE,
        'options' => ['placeholder' => 'Selecciona un tipo...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
        'addon' => [
        'prepend' => [
            'content' => Html::icon('globe')
        ],
        ],
    ])->label('Tipo de Lugar');
    ?> 
 
    </div>

   <div style="width:50%;float:left;padding-right:115%;top:27px;position: relative;left:15px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>

