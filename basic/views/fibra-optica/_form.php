<?php

use kartik\helpers\Html;
use app\models\Estacion;
use app\models\Nodo;
use app\models\CaracteristicaFo;
use yii\widgets\MaskedInput;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\date\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\FibraOptica */
/* @var $form yii\widgets\ActiveForm */

$data =  ArrayHelper::map(Estacion::find()->all(),'idestacion','nombre');
$data2 =  ArrayHelper::map(Nodo::find()->all(),'idnodo','nombre');

?>
<div class="fibra-optica-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form',
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

 <div class ="row">
        <div style="width:50%;padding-right:10%;top:10px;position: relative;left:100px">

    <?= $form->field($model, 'estacion_idestacion')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Selecciona una estación ...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
       
    ])->label('Estación #1');
    ?> 

      <?= $form->field($model, 'estacion_idestaciondos')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Selecciona una estación ...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
       
    ])->label('Estación #2');
    ?> 

      <?= $form->field($model, 'nodo_idnodo')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data2,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Selecciona un nodo ...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
       
    ])->label('Nodo #1');
    ?> 

      <?= $form->field($model, 'nodo_idnododos')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data2,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Selecciona un nodo ...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
       
    ])->label('Nodo #2');
    ?> 

     <?= $form->field($model, 'estacion_idestacion')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'distancia')->textInput() ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'periodo_mantenimiento')->textInput() ?>

    <?= $form->field($model, 'rango1')->textInput() ?>

    <?= $form->field($model, 'rango2')->textInput() ?>


</div>
 </div>   
<br/><br/>

 <div class="row">

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Datos de la Fibra Optica</h4></div>
        <div class="panel-body">

             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 5, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsFibraCaract[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'caracteristica_fo_idcaracteristica',
                    'valor',

                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsFibraCaract as $i => $modelsFibraCaract): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Datos de la F.O</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelsFibraCaract->isNewRecord) {
                                echo Html::activeHiddenInput($modelsFibraCaract, "[{$i}]id");
                            }
                        ?>
                    
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelsFibraCaract, "[{$i}]caracteristica_fo_idcaracteristica")->dropDownList( ArrayHelper::map(CaracteristicaFo::find()->all(),'idcaracteristica_fo','nombre')) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelsFibraCaract, "[{$i}]valor")->textInput(['maxlength' => true]) ?>
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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
