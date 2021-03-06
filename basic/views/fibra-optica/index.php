<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
<<<<<<< HEAD
=======
use app\models\HiloSearch;
>>>>>>> origin/master
use kartik\select2\Select2;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FibraOpticaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fibra Opticas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fibra-optica-index">

<<<<<<< HEAD

   <?php $gridColumns =[
            ['class' => 'yii\grid\SerialColumn'],
                              
                [
                'class'=>'kartik\grid\ExpandRowColumn',
                'value'=> function($model, $key, $index, $column)
                {
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function($model, $key, $index, $column)
                {
                    $searchModel = new FibraOpticaCaracSearch();
                    $searchModel->fibra_optica_idfibra_optica = $model->idfibra_optica;

                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_fibracaract',[
                       'searchModel' =>$searchModel,
                       'dataProvider' => $dataProvider,
                       ]); 
                },
            ],

            
            [
                'attribute'=>'estacion_idestacion',
                'value'=>'estacionIdestacion.nombre',
               
            ],
             [
                'attribute'=>'estacion_idestaciondos',
                'value'=>'estacionIdestaciondos.nombre',
               
            ],
             [
                'attribute'=>'nodo_idnodo',
                'value'=>'nodoIdnodo.nombre',
               
            ],
             [
                'attribute'=>'nodo_idnododos',
                'value'=>'nodoIdnododos.nombre',
               
            ],
            
=======
  <?php $gridColumns =[
            ['class' => 'yii\grid\SerialColumn'],
                              
            'codigo',
>>>>>>> origin/master
            'nombre',
            'tipo_central',
             'telefono',
            'direccion',
             'distancia',
<<<<<<< HEAD
            ]; 
    ?>
=======
             'tiempo', 
            ]; ?>
>>>>>>> origin/master



<?php ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
     'target' => ExportMenu::TARGET_BLANK,
     'exportConfig' => [
      
                ]
]);?>


<?php Pjax::begin(['id'=>'localGrid', 'timeout' => false, 
'enablePushState' => false]);?>
    <?= GridView::widget([
        'id'=>'local',
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
                $searchModel = new HiloSearch();
                $searchModel->fibra_idfibra_optica = $model->nombre;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

               return Yii::$app->controller->renderPartial('_hilo', [
                'searchModel'=> $searchModel,
                'dataProvider'=>$dataProvider,

                ]);
              },
            //'headerOptions'=>['class'=>'kartik-sheet-style'], 
            'expandOneOnly'=>true
            ],
            [
                'attribute'=>'estacion_idestacion',
                'value'=>'estacionIdestacion.nombre',
               
            ],
            [
                'attribute'=>'estacion_idestaciondos',
                'value'=>'estacionIdestaciondos.nombre',
               
            ],
            [
                'attribute'=>'nodo_idnodo',
                'value'=>'nodoIdnodo.nombre',
               
            ],
            [
                'attribute'=>'nodo_idnododos',
                'value'=>'nodoIdnododos.nombre',
               
            ],

   
            'nombre',
            'distancia',
             'observacion',
            'periodo_mantenimiento',


             ['class' => 'kartik\grid\ActionColumn',
              'contentOptions' => ['style' => 'width: 100px;', 'class' => 'text-center'],
                'template' => '{view}{update}{delete}{javi_button}',
                'buttons' => ['javi_button' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-pushpin"></span>',['/hilo/create']);
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
                Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Enlace F.O', ['create'], ['class' => 'btn btn-warning'],['id'=>'modalButton']) 
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
<<<<<<< HEAD
        'heading'=>'<h3 class="panel-title">Inspecciones</h3>',
=======
        'heading'=>'<h3 class="panel-title">Enalces de Fibra Optica</h3>',
>>>>>>> origin/master
        'type'=>'warning',
             'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Hilos F.O', ['/hilo/create'], ['class' => 'btn btn-warning']),
            'after'=>Html::a(' Modificar Hilos F.O', ['/hilo/index'], ['class' => 'btn btn-warning btn-sm']),
        'footer'=>true
       
        ],



    ]); ?>



<?= LinkPager::widget(['pagination'=>$dataProvider->pagination]);?>

<?php Pjax::end();?>

   
</div>
