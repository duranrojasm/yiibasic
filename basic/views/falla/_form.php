<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Falla */
/* @var $form yii\widgets\ActiveForm */
$data2 = ['Fibra Optica'=> 'Fibra Optica', 'Radio'=>'Radio', 'Enlace Satelital'=>'Enlace Satelital'];
?>

<div class="falla-form">

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

     <div style="width:50%;padding-right:10%;top:30px;position: relative;left:100px">

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('Causa'); ?>

   

    <?= $form->field($model, 'tipo')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data2,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Seleccione un tipo de falla ...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
       
    ])->label('Tipo');
    ?> 

     </div> 

    <div style="width:50%;float:left;padding-right:115%;top:60px;position: relative;left:150px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
