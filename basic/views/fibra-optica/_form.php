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
$items = ['1'=> '1', '2'=>'2','3'=>'3','4'=> '4', '5'=>'5','6'=>'6','7'=> '7', '8'=>'8','9'=>'9','10'=> '10', '11'=>'11','12'=>'12',
'13'=> '13', '14'=>'14','15'=>'15','16'=> '16', '17'=>'17','18'=>'18','19'=> '19', '20'=>'20','21'=>'21','22'=> '22', '23'=>'23','24'=>'24',
'25'=> '25', '26'=>'26','27'=>'27','28'=> '28', '29'=>'29','30'=>'30','31'=> '31', '32'=>'32','33'=>'33','34'=> '34', '35'=>'35','36'=>'36',
'37'=> '37', '38'=>'38','39'=>'39','40'=> '40', '41'=>'41','42'=>'42','43'=> '43', '44'=>'44','45'=>'45','46'=> '46', '47'=>'47','48'=>'48',





];

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
       
    ])->label('Estación Orig.');
    ?> 

      <?= $form->field($model, 'estacion_idestaciondos')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Selecciona una estación ...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
       
    ])->label('Estación Dest.');
    ?> 

      <?= $form->field($model, 'nodo_idnodo')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data2,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Selecciona un nodo ...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
       
    ])->label('Nodo Orig.');
    ?> 

      <?= $form->field($model, 'nodo_idnododos')->widget(Select2::classname(), [
        'value' => 'General',
        'data' =>$data2,
         'theme' => Select2::THEME_KRAJEE,

        'options' => ['placeholder' => 'Selecciona un nodo ...'],
        'pluginOptions' => [
                'allowClear' => true
        ],
       
    ])->label('Nodo Dest.');
    ?> 

     
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,'placeholder' => 'Ej. S/C - SJK'])->label('Nombre'); ?>

    <?= $form->field($model, 'distancia')->textInput(['maxlength' => true,'placeholder' => 'Ej. 34'])->label('Distancia (Km)'); ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true,'placeholder' => 'Ej. Pto de Referencia'])->label('Observación'); ?>

    <?= $form->field($model, 'periodo_mantenimiento')->textInput(['maxlength' => true,'placeholder' => 'Ej. 16'])->label('Período de Mantem.'); ?>

    <?= $form->field($model, 'rango1')->dropDownList($items,['prompt'=>'Seleccione un número de fibra','id'=>'user_dropdown'])->label('Num. de Fibra incio');  ?>

    <?= $form->field($model, 'rango2')->dropDownList($items,['prompt'=>'Seleccione un número de fibra','id'=>'user_dropdown'])->label('Num. de Fibra fin');  ?>


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
                                <?= $form->field($modelsFibraCaract, "[{$i}]caracteristica_fo_idcaracteristica")->dropDownList(
                                ArrayHelper::map(CaracteristicaFo::find()->all(),'idcaracteristica_fo','nombre'),['prompt'=>'Seleccione una opc','id'=>'user_dropdown'])->label('Característica'); ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelsFibraCaract, "[{$i}]valor")->textInput(['maxlength' => true])->label('Valor'); ?>
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
