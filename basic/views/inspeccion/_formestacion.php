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
use app\models\Nodo;
use app\models\Item;
use wbraganca\dynamicform\DynamicFormWidget;
use app\models\Multimedia;
use kartik\widgets\FileInput;
use yii\helpers\Url;

$Archivo = new Multimedia(); 


$data =  ArrayHelper::map(Estacion::find()->all(),'idestacion','nombre');
$items = ['Bien'=> 'Bien', 'Regular'=>'Regular','Mal'=>'Mal','Urgente'=>'Urgente','No existe'=>'No existe','Aviso SAP'=> 'Aviso SAP',
];


/* @var $this yii\web\View */
/* @var $model app\models\Inspeccion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspeccion-form">

     <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data', 'data-pjax' => true ]
,'id'=>'dynamic-form',
            'type' => ActiveForm::TYPE_VERTICAL,
            'formConfig' => [
                'labelSpan' => 3, 
                'deviceSize' => ActiveForm::SIZE_SMALL,
                'showErrors' => true,
                
               //'showLabels'=>ActiveForm::SCREEN_READER
                ]
            //'fullSpan'=>12

    ]
); ?>


<div class="row">
    <div style="width:50%;padding-right:10%;top:10px;position: relative;left:100px">

        <?= $form->field($model, 'estacion_idestacion')->widget(Select2::classname(), [
            'value' => 'General',
            'data' =>$data,
            'theme' => Select2::THEME_KRAJEE,

            'options' => ['placeholder' => 'Selecciona una estacion...'],
            'pluginOptions' => [
                'allowClear' => true
        ],
       
        ])->label('Estacion');?>    



        <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true])->label('Descripción'); ?>

        <?= $form->field($model, 'ptos_referencia')->textInput(['maxlength' => true])->label('Pto de Referencia'); ?>

        <!--<?= $form->field($model, 'fecha_asig')->widget(DatePicker::classname(), [
            'language' => 'es',    
            'options' => ['placeholder' => 'Fecha de Asignación...'],
            'pluginOptions' => [
                'format' => 'dd-mm-yyyy',
                'autoclose'=>true
            ]
        ])->label('Fecha de Asignación'); ?>-->


        <?= $form->field($model, 'fecha_insp')->widget(DatePicker::classname(), [
            'language' => 'es',    
            'options' => ['placeholder' => 'Fecha de Asignación...'],
            'pluginOptions' => [
                'format' => 'dd-mm-yyyy',
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

    
    <br/><br/>

 <div class="row">

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Descripción de la estación</h4></div>
        <div class="panel-body">

             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 5, // the maximum times, an element can be cloned (default 999)
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
                                <?= $form->field($modelsEstadoItemIns, "[{$i}]item_iditem")->dropDownList( ArrayHelper::map(Item::find()->where(['=', 'tipo', 'Estación'])->all(),'iditem','nombre'))->label('Item'); ?>
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
 </div>






    <div style="width:50%;float:left;padding-right:115%;top:10px;position: relative;left:150px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>

        <?php ActiveForm::end(); ?>

    
</div>
