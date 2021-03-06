<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\grid\GridView;
use kartik\grid\GridView;
use app\models\Vehiculo;
use kartik\select2\Select2;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiculoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-index">

 <?php $gridColumns =[
            ['class' => 'yii\grid\SerialColumn'],
                              
             'control',
            'placa',
            'marca',
            'modelo',
            [
                'class'=>'kartik\grid\BooleanColumn',
                'attribute'=>'estatus', 
                'vAlign'=>'middle'
            ], 
             'ano',
             'unidad',
             'estado',
             'aviso',
             'obser_aviso',
             'fecha',
            
            ]; ?>



<?php ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
     'target' => ExportMenu::TARGET_BLANK,
     'exportConfig' => [
       // ExportMenu::FORMAT_PDF => false,
                ]
]);?>
  

  <?php Pjax::begin(['id'=>'vehicGrid', 'timeout' => false, 
'enablePushState' => false]);?>  

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
             ['class' => 'yii\grid\SerialColumn',
               'contentOptions' => ['style' => 'width: 30px;', 'class' => 'text-center'],
            ],

            //'idvehiculo',
            'control',
            'placa',
            'marca',
            'modelo',
            'ano',
            // 'unidad',
            // 'estado',
            'aviso',
            'obser_aviso',
            'fecha',
             [
                'class'=>'kartik\grid\BooleanColumn',
                'attribute'=>'estatus', 
                'vAlign'=>'middle'
            ], 

           
             ['class' => 'yii\grid\ActionColumn',
              'contentOptions' => ['style' => 'width: 100px;', 'class' => 'text-center'],
                'template' => '{view}{update}{delete}{javi_button}',
                'buttons' => ['javi_button' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-pushpin"></span>',['create']);
                        }],
                ],
        ],


         'pjax'=>true,
         'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjaxSettings'=>[
           'neverTimeout'=>true,
            //'loadingCssClass'=>true,
           
             ],

         'exportConfig'=> [
                GridView::EXCEL=>[
                     'filename' => 'Appointments',
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
        'filename' => 'griddd',
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
                //'subject' => Yii::t('kvgrid', 'PDF export generated by kartik-v/yii2-grid extension'),
                //'keywords' => Yii::t('kvgrid', 'krajee, grid, export, yii2-grid, pdf')
            ],
            'contentBefore'=>'',
            'contentAfter'=>''
        ]
    ],


            ],

          'toolbar' => [
        [
            'content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Vehiculo', ['create'], ['class' => 'btn btn-warning'],['id'=>'modalButton']) 
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
        'heading'=>'<h3 class="panel-title">Vehiculos</h3>',
        'type'=>'warning',
             //'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Localidad', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Actualizar', ['index'], ['class' => 'btn btn-warning btn-sm']),
        'footer'=>true
       
        ],   


    ]); ?>

<?php Pjax::end();?>


</div>
