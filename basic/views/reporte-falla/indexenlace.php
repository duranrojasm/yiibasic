<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\grid\GridView;
use kartik\grid\GridView;
use app\models\UsuarioReportefSearch;
use kartik\select2\Select2;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\editable\Editable;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ReporteFallaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reporte Fallas';
$this->params['breadcrumbs'][] = $this->title;
$data2 = ['En Proceso'=> 'En Proceso', 'Resuelto'=>'Resuelto'];
?>
<div class="reporte-falla-index">

   <?php $gridColumns =[
            ['class' => 'yii\grid\SerialColumn'],
                              
                         'descripcion',
             
          
              [
                'attribute'=>'falla_idfalla',
                'value'=>'fallaIdfalla.nombre',
                'label'=> 'Causa',
               
            ],
        
            'fecha_inicio',
             
           
             [
                    'class'=>'kartik\grid\EditableColumn',
                    
                    'attribute'=>'estatus',
                    
                     'editableOptions'=>[
                          
                            'size'=>'md',
                            'inputType'=>\kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                            'displayValueConfig' => $data2,
                            'data'=>$data2,
                            'options' => ['name' => 'estatus'],
                            
                            ]
                    
                    
              ],   
                 [
                'attribute'=>'estacion_idestacion',
                'value'=>'estacionIdestacion.nombre',
                'label'=>'Estación',
               
            ],
            [
                'attribute'=>'enlace_satelital_idenlace_satelital',
                'value'=>'enlaceSatelitalIdenlaceSatelital.codigo',
                'label'=>'Código Enlace Sat.',
               
            ],
          
            
             'urgencia',
            ]; ?>



<?php ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
     'target' => ExportMenu::TARGET_BLANK,
     'exportConfig' => [
        
                ]
]);?>

<?php Pjax::begin(['id' => 'admin', 'timeout' => false, 'enablePushState' => false, 'clientOptions' => ['method' => 'POST']]);?>


    <?= GridView::widget([
        'id'=>'segur',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=>'', 
         'columns' =>  [
            ['class' => 'kartik\grid\SerialColumn',
               'contentOptions' => ['style' => 'width: 30px;', 'class' => 'text-center'],
            ],
          
            [
             'class'=>'kartik\grid\ExpandRowColumn',
             'width'=>'50px',
            'value'=>function ($model, $key, $index, $column) {
              return GridView::ROW_COLLAPSED;
             },
             'detail'=>function ($model, $key, $index, $column) {
                $searchModel = new UsuarioReportefSearch();
                $searchModel->reporte_falla_idreporte_falla = $model->idreporte_falla;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

               return Yii::$app->controller->renderPartial('_personal', [
                'searchModel'=> $searchModel,
                'dataProvider'=>$dataProvider,

                ]);
              },
            //'headerOptions'=>['class'=>'kartik-sheet-style'], 
            'expandOneOnly'=>true
            ],
              'descripcion',
             
          
              [
                'attribute'=>'falla_idfalla',
                'value'=>'fallaIdfalla.nombre',
                'label'=> 'Causa',
               
            ],
        
            'fecha_inicio',
             
           
             [
                    'class'=>'kartik\grid\EditableColumn',
                    
                    'attribute'=>'estatus',
                    
                     'editableOptions'=>[
                          
                            'size'=>'md',
                            'inputType'=>\kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                            'displayValueConfig' => $data2,
                            'data'=>$data2,
                            'options' => ['name' => 'estatus'],
                            
                            ]
                    
                    
              ],   
                 [
                'attribute'=>'estacion_idestacion',
                'value'=>'estacionIdestacion.nombre',
                'label'=>'Estación',
               
            ],
            [
                'attribute'=>'enlace_satelital_idenlace_satelital',
                'value'=>'enlaceSatelitalIdenlaceSatelital.codigo',
                'label'=>'Código Enlace Sat.',
               
            ],
          
            
             'urgencia',
          
           


             ['class' => 'kartik\grid\ActionColumn',
              'contentOptions' => ['style' => 'width: 100px;', 'class' => 'text-center'],
                'template' => '{view}{update}{delete}',
                
                ],
        ],
        
         'pjax'=>true,
         'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjaxSettings'=>[
           'neverTimeout'=>true,
           'refreshGrid' => true,
            //'loadingCssClass'=>true,
           
             ],

         'exportConfig'=> [
                GridView::EXCEL=>[
                     'filename' => Yii::t('kvgrid', 'Appointments'),
                    'showPageSummary' => true,
                ],

                GridView::PDF => [
        'label' => Yii::t('kvgrid', 'PDF'),
        //'icon' => $isFa ? 'file-pdf-o' : 'floppy-disk',
        'iconOptions' => ['class' => 'text-danger'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('kvgrid', 'grid-export'),
        'alertMsg' => Yii::t('kvgrid', 'The PDF export file will be generated for download.'),
        'options' => ['title' => Yii::t('kvgrid', 'Portable Document Format')],
        'mime' => 'application/pdf',
        'config' => [
            'mode' => 'c',
            'format' => 'A4-L',
            'destination' => 'D',
            'marginTop' => 20,
            'marginBottom' => 20,
            'cssInline' => '.kv-wrap{padding:20px;}' .
                '.kv-align-center{text-align:center;}' .
                '.kv-align-left{text-align:left;}' .
                '.kv-align-right{text-align:right;}' .
                '.kv-align-top{vertical-align:top!important;}' .
                '.kv-align-bottom{vertical-align:bottom!important;}' .
                '.kv-align-middle{vertical-align:middle!important;}' .
                '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
            'methods' => [
                'SetHeader' => [
                //    ['odd' => $pdfHeader, 'even' => $pdfHeader]
                ],
                'SetFooter' => [
                //   ['odd' => $pdfFooter, 'even' => $pdfFooter]
                ],
            ],
            'options' => [
                'title' => 'HOLAAA',
                'subject' => Yii::t('kvgrid', 'PDF export generated by kartik-v/yii2-grid extension'),
                'keywords' => Yii::t('kvgrid', 'krajee, grid, export, yii2-grid, pdf')
            ],
            'contentBefore'=>'',
            'contentAfter'=>''
        ]
    ],


            ],

        'toolbar' => [
        [
            'content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i> Registrar Falla', ['/reporte-falla/creates'], ['class' => 'btn btn-warning'],['id'=>'modalButton']) 
                . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-link']),
           
        ],
        '{export}',
     '{toggleData}',
        ],

       'toggleDataContainer' => ['class' => 'btn-group-sm'],
       // 'export'=>true,
        'exportContainer' => ['class' => 'btn-group-sm'],
        'layout'=>"{summary}\n{items}\n{pager}",
        'responsiveWrap'=>false,
        //'resizableColumns'=>true,
        'bootstrap' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover'=>true,

        'pager' => [
                  //   'firstPageLabel' => 'First Page',
                    //  'lastPageLabel' => 'Last Page',
                  'class' => '\yii\widgets\LinkPager',
                   //    'class' => 'app\widgets\DropdownPager',
                //other pager config if nesessary
                ],


        'panel' => [
        'heading'=>'<h3 class="panel-title">Fallas Enlaces Satelitales</h3>',
        'type'=>'warning',
             //'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Localidad', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Actualizar', ['indexenlace'], ['class' => 'btn btn-warning btn-sm']),
        'footer'=>true
       
        ],



    ]); ?>



<?= LinkPager::widget(['pagination'=>$dataProvider->pagination]);?>
<?php Pjax::end();?>


</div>
<?php
$script = <<< JS
 
            
        $.pjax.defaults.timeout = false;
       // $.pjax.reload({container:'#admin'});

      //  $('#segur').yiiGridView('update')
      

 
JS;
$this->registerJs($script); 
?>  