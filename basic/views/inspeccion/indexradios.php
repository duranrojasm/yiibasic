<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\Vehiculo;
use app\models\Multimedia;
use kartik\select2\Select2;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use app\models\EstadoItemIsnpeccionSearch;
use app\models\RadioCaracSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InspeccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inspeccions';
$this->params['breadcrumbs'][] = $this->title;
$Archivo = new Multimedia();
?>
<div class="inspeccion-index">
        
        <?php $gridColumns =[
            ['class' => 'yii\grid\SerialColumn'],
                              
                [
                'class'=>'kartik\grid\ExpandRowColumn',
                'value'=> function($model, $key, $indexestacion, $column)
                {
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function($model, $key, $index, $column)
                {
                    $searchModel = new RadioCaracSearch();
                    $searchModel->inspeccion_idinspeccion = $model->idinspeccion;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_EstadoInspradios',[
                       'searchModel' =>$searchModel,
                       'dataProvider' => $dataProvider,
                       ]); 
                },
            ],
            [
              'attribute' => 'multimedia_idmultimedia',
              'format' => 'html',
              'label' => 'ImageColumnLable',
              'value' => function ($data2) {
                $a =  ArrayHelper::map(Multimedia::find()->where(['=', 'inspeccion_idinspeccion', $data2->idinspeccion])->all(),'idmultimedia','multimedia');

                 foreach ($a as $obj) {
                                      
                        return Html::img('uploads/'.$data2->radioIdradio->nombre.'-'.$data2->idinspeccion.'/'. $obj,
                        ['width' => '100px']);
                  }   
                    
              },
            ],
            
            [
                'attribute'=>'radio_idradio',
                'value'=>'radioIdradio.nombre',
               
            ],
                       
            
            
            'ptos_referencia',
            'fecha_asig',
            'fecha_insp',
            [
                'class'=>'kartik\grid\BooleanColumn',
                'attribute'=>'estatus', 
                'vAlign'=>'middle'
            ], 
            ]; 
    ?>
    
    <?php ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'target' => ExportMenu::TARGET_BLANK,
        'exportConfig' => []
        ]);
     ?>

    
    <?php Pjax::begin(['id'=>'localGrid', 'timeout' => false,'enablePushState' => false]);?>
        <?= GridView::widget([
        'id'=>'local',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
             'contentOptions' => ['style' => 'width: 30px;', 'class' => 'text-center'],
            ],
            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'value'=> function($model, $key, $indexestacion, $column)
                {
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function($model, $key, $indexestacion, $column)
                {
                    $searchModel = new RadioCaracSearch();
                    $searchModel->inspeccion_idinspeccion = $model->idinspeccion;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_EstadoInspradios',[
                       'searchModel' =>$searchModel,
                       'dataProvider' => $dataProvider,
                       ]); 
                },
            ],
           
            
            
            
            [
                'attribute'=>'radio_idradio',
                'label' => 'Radio',
                'value'=>'radioIdradio.nombre',
               
            ],
              
           // [
            //  'attribute' => 'multimedia_idmultimedia',
           //   'format' => 'html',
           //   'label' => 'ImageColumnLable',
           //   'value' => function ($data2) {
            //    $a =  ArrayHelper::map(Multimedia::find()->where(['=', 'inspeccion_idinspeccion', $data2->idinspeccion])->all(),'idmultimedia','multimedia');

            //     foreach ($a as $obj) {
                                      
            //            return Html::img('uploads/'.$data2->estacionIdestacion->nombre.'-'.$data2->idinspeccion.'/'. $obj,
            //            ['width' => '100px']);
            //      }   
                    
            //  },
            //],       
            
            'descripcion',
            'ptos_referencia',
            'fecha_asig',
            'fecha_insp',

            [
                'class'=>'kartik\grid\BooleanColumn',
                'attribute'=>'estatus', 
                'vAlign'=>'middle'
            ], 
             
             ['class' => 'yii\grid\ActionColumn',
              'contentOptions' => ['style' => 'width: 100px;', 'class' => 'text-center'],
                'template' => '{viewradio}{update}{delete}{javi_button}',
                'buttons' => ['javi_button' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-pushpin"></span>',['radio']);
                        }],
                ],
        ],


        'pjax'=>true,
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjaxSettings'=>[
           'neverTimeout'=>true,
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
                Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Inspeccion', ['radio'], ['class' => 'btn btn-warning'],['id'=>'modalButton']) 
                . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['indexradios'], ['class' => 'btn btn-link']),
           
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
        'heading'=>'<h3 class="panel-title">Inspecciones</h3>',
        'type'=>'warning',
             //'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Localidad', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Actualizar', ['indexradio'], ['class' => 'btn btn-warning btn-sm']),
        'footer'=>true
       
        ],



    ]); ?>



<?= LinkPager::widget(['pagination'=>$dataProvider->pagination]);?>

<?php Pjax::end();?>



            

</div>
