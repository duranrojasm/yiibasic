<?php

use kartik\helpers\Html;
use app\models\FibraOptica;
use yii\widgets\MaskedInput;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\date\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Hilo */
/* @var $form yii\widgets\ActiveForm */
$data =  ArrayHelper::map(FibraOptica::find()->all(),'idfibra_optica','nombre');
$dataPost = ['1'=> '1', '2'=>'2','3'=>'3','4'=> '4', '5'=>'5','6'=>'6','7'=> '7', '8'=>'8','9'=>'9','10'=> '10', '11'=>'11','12'=>'12',
'13'=> '13', '14'=>'14','15'=>'15','16'=> '16', '17'=>'17','18'=>'18','19'=> '19', '20'=>'20','21'=>'21','22'=> '22', '23'=>'23','24'=>'24',
'25'=> '25', '26'=>'26','27'=>'27','28'=> '28', '29'=>'29','30'=>'30','31'=> '31', '32'=>'32','33'=>'33','34'=> '34', '35'=>'35','36'=>'36',
'37'=> '37', '38'=>'38','39'=>'39','40'=> '40', '41'=>'41','42'=>'42','43'=> '43', '44'=>'44','45'=>'45','46'=> '46', '47'=>'47','48'=>'48',
];
?>

<div class="hilo-form">

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

     <?= $form->field($model, 'fibra_idfibra_optica')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Seleccione una fibra...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
      
    ])->label('Fibra Optica'); ?>

    <?= $form->field($model, 'numhilo')->dropDownList($dataPost,['prompt'=>'-Seleccione número de hilo-']);?>

  
    <?= $form->field($model, 'ttodest')->textInput(['maxlength' => true,'placeholder' => 'Ej. Dest'])->label('TTO/DEST'); ?>

    <?= $form->field($model, 'ab')->textInput(['maxlength' => true,'placeholder' => 'Ej. 25 GB'])->label('AB'); ?>

    <?= $form->field($model, 'sist')->textInput(['maxlength' => true,'placeholder' => 'Ej. xs'])->label('SIST_INST'); ?>

    <?= $form->field($model, 'band')->textInput(['maxlength' => true,'placeholder' => 'Ej. Dest'])->label('BAND_EM'); ?>

    <?= $form->field($model, 'odf')->textInput(['maxlength' => true,'placeholder' => 'Ej. 2f'])->label('ODF'); ?>

    <?= $form->field($model, 'des_esp')->textInput(['maxlength' => true,'placeholder' => 'Ej. 2f-t'])->label('Dest. Especifico'); ?>

    <?= $form->field($model, 'observ')->textInput(['maxlength' => true,'placeholder' => 'Ej. xyz'])->label('Observación'); ?>

</div>

  <div style="width:50%;float:left;padding-right:115%;top:10px;position: relative;left:150px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


    

