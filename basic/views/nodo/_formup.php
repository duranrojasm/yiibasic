<?php


use yii\helpers\Html;
use app\models\Estacion;
use app\models\Rol;
use yii\widgets\MaskedInput;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\date\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Nodo */
/* @var $form yii\widgets\ActiveForm */
$data =  ArrayHelper::map(Estacion::find()->all(),'idestacion','nombre');
?>

<div class="nodo-form">

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
        'data' =>$data,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Selecciona una estación ...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
       
    ])->label('Estación');
    ?> 

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true,'placeholder' => 'Ej. Outlook'])->label('Tipo'); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,'placeholder' => 'Ej. Nodo T'])->label('Nombre'); ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true,'placeholder' => 'Ej. Pto de Referencia'])->label('Dirección'); ?>

    <?= $form->field($model, 'identificacion')->textInput(['maxlength' => true,'placeholder' => 'Ej. Carlos Alberto'])->label('Identificación'); ?>

    <?= $form->field($model, 'contacto_red')->textInput(['maxlength' => true,'placeholder' => 'Ej. Carlos Alberto'])->label('Contacto Red'); ?>

    <?= $form->field($model, 'contacto_mant')->textInput(['maxlength' => true,'placeholder' => 'Ej. Carlos Alberto'])->label('Contacto Mantenimiento'); ?>

    
    </div>

  <div style="width:50%;float:left;padding-right:115%;top:10px;position: relative;left:150px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>