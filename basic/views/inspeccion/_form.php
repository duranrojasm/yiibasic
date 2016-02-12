<?php

use yii\helpers\Html;
use kartik\widgets\FileInput;
use app\models\Multimedia;
use yii\widgets\MaskedInput;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\date\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Nodo;
use app\models\Item;
use wbraganca\dynamicform\DynamicFormWidget;
use app\models\Estacion;
use app\models\Rol;

/* @var $this yii\web\View */
/* @var $model app\models\Inspeccion */
/* @var $form yii\widgets\ActiveForm */

$Archivo = new Multimedia();

$data =  ArrayHelper::map(Nodo::find()->all(),'idnodo','nombre');
$items = ['Bien'=> 'Bien', 'Malo'=>'Malo','No existe'=>'No existe','M2'=> 'M2',
];

?>

<div class="row">
    <div style="width:50%;padding-right:10%;top:10px;position: relative;left:100px">
<div class="inspeccion-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form',

                'options' => [
                    'data-pjax' => true,
                    'enctype'=>'multipart/form-data'
                     
                ],                
                'type' => ActiveForm::TYPE_VERTICAL,
                'formConfig' => [
                    'labelSpan' => 3, 
                    'deviceSize' => ActiveForm::SIZE_SMALL,
                    'showErrors' => true,
                    //'showLabels'=>ActiveForm::SCREEN_READER
                ]
            ]); ?>

    <?= $form->field($model, 'nodo_idnodo')->widget(Select2::classname(), [
            'value' => 'General',
            'data' =>$data,
            'theme' => Select2::THEME_KRAJEE,

            'options' => ['placeholder' => 'Selecciona un nodo...'],
            'pluginOptions' => [
                'allowClear' => true
        ],
       
        ])->label('Nodo'); ?>

    

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true])->label('Descripción'); ?>

    <?= $form->field($model, 'ptos_referencia')->textInput(['maxlength' => true]) ->label('Pto de Referencia'); ?>

    <?= $form->field($model, 'fecha_asig')->widget(DatePicker::classname(), [
            'language' => 'es',    
            'options' => ['placeholder' => 'Fecha de Asignación...'],
            'pluginOptions' => [
                'format' => 'dd-M-yyyy',
                'autoclose'=>true
            ]
        ])->label('Fecha de Asignación'); ?>

    <?= $form->field($model, 'fecha_insp')->textInput()->widget(DatePicker::classname(), [
            'language' => 'es',    
            'options' => ['placeholder' => 'Fecha de Asignación...'],
            'pluginOptions' => [
                'format' => 'dd-M-yyyy',
                'autoclose'=>true
            ]
        ])->label('Fecha de Inspección'); ?>

    <?= $form->field($model, 'estatus')->widget(SwitchInput::classname(), [
            'pluginOptions'=>[
            'handleWidth'=>90,
            'onText'=>'Realizada',
            'offText'=>'No Realizada ',
            'onColor' => 'success',
            'offColor' => 'danger',
]
        ])->label('Estatus'); ?>



    <?= $form->field($Archivo, 'multimedia[]')->widget(FileInput::classname(), [
                'name' => 'attachments',
                'options' => ['multiple' => true],
                'pluginOptions' => ['previewFileType' => 'any','showUpload' => false]
        ])->label('Archivo');
    ?>

</div>
</div>
</div>

 <br/><br/>

 

    <div class="panel panel-default">
        
        <div class="panel-body">

             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsEstadoItemIns[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'item_iditem',
                    'valor',

                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsEstadoItemIns as $i => $modelsEstadoItemIns): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Datos</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelsEstadoItemIns->isNewRecord) {
                                echo Html::activeHiddenInput($modelsEstadoItemIns, "[{$i}]inspeccion_idinspeccion");
                            }
                        ?>
                    
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelsEstadoItemIns, "[{$i}]item_iditem")->dropDownList( ArrayHelper::map(Item::find()->where(['=', 'tipo', 'Nodo'])->all(),'iditem','nombre'))->label('Item'); ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelsEstadoItemIns, "[{$i}]valor")->dropDownList($items,['prompt'=>'Seleccione','id'=>'user_dropdown'])->label('Valor'); ?>
                            </div>
                        </div><!-- .row -->
                       
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    
 





    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
