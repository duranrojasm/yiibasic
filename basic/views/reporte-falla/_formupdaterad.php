<?php

use yii\helpers\Html;
use app\models\Usuario;
use app\models\Falla;
use yii\widgets\MaskedInput;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\date\DatePicker;
use kartik\widgets\SwitchInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Nodo;
use app\models\Vehiculo;
use app\models\Radio;
use app\models\Estacion;
use app\models\Item;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\ReporteFalla */
/* @var $form yii\widgets\ActiveForm */
$data =  ArrayHelper::map(Falla::find()->where(['=', 'tipo', 'Radio'])->all(),'idfalla','nombre');
$data2 = ['En Proceso'=> 'En Proceso', 'Resuelto'=>'Resuelto'];
$data3 = ['Normal'=> 'Normal', 'Urgente'=>'Urgente'];
$data4 = ['Encargado'=> 'Encargado', 'Ayudante'=>'Ayudante'];
$data5 = ArrayHelper::map(Usuario::find()->where(['=', 'disponibilidad', 'TRUE'])->all(),'idusuario','nombre');
$count= count($data5);
$data6 = ArrayHelper::map(Vehiculo::find()->all(),'idvehiculo','control');
$estac = ArrayHelper::map(Estacion::find()->where(['!=','idestacion','1'])->all(),'idestacion','nombre');
$radio = ArrayHelper::map(Radio::find()->all(),'idradio','serial');
?>

<div class="reporte-falla-form">

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


  <div style="width:50%;padding-right:10%;top:10px;position: relative;left:100px">

    <div class="row">
    <?= $form->field($model, 'falla_idfalla')->widget(Select2::classname(), [
            'value' => 'General',
            'data' =>$data,
            'theme' => Select2::THEME_KRAJEE,

            'options' => ['placeholder' => 'Seleccione una falla...'],
            'pluginOptions' => [
                'allowClear' => true
        ],
       
        ])->label('Falla');?>    

         <?= $form->field($model, 'estacion_idestacion')->dropDownList($estac, 
             ['prompt'=>'Seleccione estación...',
               'id'=>'punto',
               'onchange'=>' $.post( "index.php?r=reporte-falla/listarad&id='.'"+$(this).val(), function( data ) {
                $("#rad").html( data );
                });  '
            
             ])->label('Estación Referencia');?>
           

            <?= $form->field($model, 'radio_idradio')->dropDownList($radio, 
             ['prompt'=>'Seleccione serial del radio...',
                'id'=>'rad'
            
             ])->label('Radio');?>


    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true])->label('Descripción'); ?>

    

    <?= $form->field($model, 'fecha_inicio')->widget(DatePicker::classname(), [
            'language' => 'es',    
            'options' => ['placeholder' => 'Fecha de Comienzo...'],
            'pluginOptions' => [
                'format' => 'dd-M-yyyy',
                'autoclose'=>true
            ]
        ])->label('Fecha de Asignación'); ?>

           <?= $form->field($model, 'fecha_fin')->widget(DatePicker::classname(), [
            'language' => 'es',    
            'options' => ['placeholder' => 'Fecha de Fin...'],
            'pluginOptions' => [
                'format' => 'dd-M-yyyy',
                'autoclose'=>true
            ]
        ])->label('Fecha de Inspección'); ?>
  

    <?= $form->field($model, 'estatus')->dropDownList(
            $data2,         
            ['prompt'=>'Estatus...']   
        )->label('Estatus'); ?>

  

    <?= $form->field($model, 'urgencia')->dropDownList(
            $data3,          
            ['prompt'=>'Prioridad...']    
        )->label('Prioridad'); ?>  
 </div>       

</div>


  <br/><br/>

 <div class="row">

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Personal para Asignar</h4></div>
        <div class="panel-body">

             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => $count, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsPersonal[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'usuario_idusuario',
                    'cargo',

                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsPersonal as $i => $modelsPersonal): ?>
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
                            if (! $modelsPersonal->isNewRecord) {
                                echo Html::activeHiddenInput($modelsPersonal, "[{$i}]reporte_falla_idreporte_falla");
                            }
                        ?>
                    
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelsPersonal, "[{$i}]usuario_idusuario")->dropDownList( $data5,['prompt'=>'Seleccione un personal...'])->label('Personal'); ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelsPersonal, "[{$i}]cargo")->dropDownList($data4,['prompt'=>'Seleccione una responsabilidad...'])->label('Cargo'); ?>
                            </div>
                             <div class="col-sm-6">
                                <?= $form->field($modelsPersonal, "[{$i}]vehiculo")->dropDownList( $data6,['prompt'=>'Seleccione un vehiculo...'])->label('Vehiculo'); ?>
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