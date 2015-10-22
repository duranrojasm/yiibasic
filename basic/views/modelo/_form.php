<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use yii\helpers\ArrayHelper;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;

/* @var $this yii\web\View */
/* @var $model app\models\Modelo */
/* @var $form yii\widgets\ActiveForm */

$data = ['Radio IP'=>'Radio IP','Otro Radio'=>'Otro Radio'];
?>

<div class="modelo-form">

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
	 	
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('Nombre') ?>

    <?= $form->field($model, 'tipo')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Selecciona un tipo ...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
       
    ])->label('Tipo') ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true])->label('Descripción') ?>

     </div> 

    <div style="width:50%;float:left;padding-right:115%;top:60px;position: relative;left:150px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
