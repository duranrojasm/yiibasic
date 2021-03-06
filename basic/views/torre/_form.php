<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;

/* @var $this yii\web\View */
/* @var $model app\models\Torre */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="torre-form">

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

  <div style="width:50%;padding-right:10%;top:30px;position: relative;left:100px">

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true])->label('Nombre') ?>

    <?= $form->field($model, 'altura')->textInput()->label('Altura') ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true])->label('Tipo') ?>

  </div> 

   <div style="width:50%;float:left;padding-right:115%;top:60px;position: relative;left:150px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
   </div>

    <?php ActiveForm::end(); ?>

</div>
