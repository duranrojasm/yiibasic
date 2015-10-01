<?php

use yii\helpers\Html;
//use kartik\widgets\ActiveForm;
//use kartik\widgets\ActiveField;
use app\models\Localidad;
use kartik\select2\Select2;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use yii\helpers\ArrayHelper;

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
?>


<div class="localidad-form">

<?php yii\widgets\Pjax::begin(['id' => 'nuevo']) ?>

    <?php $form = ActiveForm::begin(['id'=>$model->formName(),
            'type' => ActiveForm::TYPE_VERTICAL,
            'options' => ['data-pjax' => true ],
            'formConfig' => [
                'labelSpan' => 1, 
                'deviceSize' => ActiveForm::SIZE_SMALL,
                'showErrors' => true,
                
               //'showLabels'=>ActiveForm::SCREEN_READER
                ]
            //'fullSpan'=>12

    ]); ?>

     <?= $form->field($model, 'localidad_idlocalidad')->dropDownList(
        ArrayHelper::map(Localidad::find()->all(),'idlocalidad','nombre'),
      ['prompt'=>'Seleccione Localidad']) 
    ?> 

 
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo')->dropDownList(['prompt'=>'Seleccione Tipo de Ubicación','Region'=>'Region','Estado'=>'Estado']) ?>

 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php yii\widgets\Pjax::end() ?>

</div>

