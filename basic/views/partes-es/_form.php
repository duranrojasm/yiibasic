<?php


use yii\helpers\Html;
use kartik\select2\Select2;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use yii\helpers\ArrayHelper;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;

/* @var $this yii\web\View */
/* @var $model app\models\PartesEs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partes-es-form">

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

    <?= $form->field($model, 'enlace_satelital_idenlace_satelital')->textInput()->label('Enlace Satelital') ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->label('Nombre')?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true])->label('Serial') ?>

     </div> 

    <div style="width:50%;float:left;padding-right:115%;top:60px;position: relative;left:150px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
