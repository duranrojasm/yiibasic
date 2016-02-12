<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\Vehiculo;
<<<<<<< HEAD
use app\models\Multimedia;
use app\models\Nodo;
=======
>>>>>>> origin/master
use kartik\select2\Select2;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use app\models\EstadoItemIsnpeccionSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InspeccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inspeccions';
$this->params['breadcrumbs'][] = $this->title;
$Archivo = new Multimedia();
$fecha_asig= date('Y-m-d');
//print_r($fecha_asig);
$fecha_resta = date('Y-m-d',strtotime('2016-01-09'));
//print_r($fecha_resta);



function compararFechas($primera, $segunda)
 {
  $valoresPrimera = explode ("/", $primera);   
  $valoresSegunda = explode ("/", $segunda); 
  $diaPrimera    = $valoresPrimera[0];  
  $mesPrimera  = $valoresPrimera[1];  
  $anyoPrimera   = $valoresPrimera[2]; 
  $diaSegunda   = $valoresSegunda[0];  
  $mesSegunda = $valoresSegunda[1];  
  $anyoSegunda  = $valoresSegunda[2];
  $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
  $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     
  if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
    // "La fecha ".$primera." no es válida";
    return 0;
  }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
    // "La fecha ".$segunda." no es válida";
    return 0;
  }else{
    return  $diasPrimeraJuliano - $diasSegundaJuliano;
  } 
}
$primera = date('d/m/Y');
$segunda = "01/01/2016";
//echo compararFechas ($primera,$segunda);

$dt_elMesPasado = date('Y-m-d', strtotime('+6 month')) ; // resta 1 mes
echo $dt_elMesPasado;


?>
<div class="inspeccion-index">
        
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
                    $searchModel = new EstadoItemIsnpeccionSearch();
                    $searchModel->inspeccion_idinspeccion = $model->idinspeccion;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_EstadoInsp',[
                       'searchModel' =>$searchModel,
                       'dataProvider' => $dataProvider,
                       ]); 
                },
            ],
<<<<<<< HEAD
            [
              'attribute' => 'multimedia_idmultimedia',
              'format' => 'html',
              'label' => 'ImageColumnLable',
              'value' => function ($data) {
                $a =  ArrayHelper::map(Multimedia::find()->where(['=', 'inspeccion_idinspeccion', $data->idinspeccion])->all(),'idmultimedia','multimedia');

                 foreach ($a as $obj) {
                                      
                        return Html::img('uploads/'.$data->nodoIdnodo->nombre.'-'.$data->idinspeccion.'/'. $obj,
                        ['width' => '100px']);
                  }   
                    
              },
            ],
=======

>>>>>>> origin/master
            
            [
                'attribute'=>'nodo_idnodo',
                'value'=>'nodoIdnodo.nombre',
               
            ],
                       
            
<<<<<<< HEAD
            
=======
            'descripcion',
>>>>>>> origin/master
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
                'value'=> function($model, $key, $index, $column)
                {
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function($model, $key, $index, $column)
                {
                    $searchModel = new EstadoItemIsnpeccionSearch();
                    $searchModel->inspeccion_idinspeccion = $model->idinspeccion;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_EstadoInsp',[
                       'searchModel' =>$searchModel,
                       'dataProvider' => $dataProvider,
                       ]); 
                },
            ],
<<<<<<< HEAD
            //IMAGEN DEL DOCUMENTO / IMAGEN
            //[
            //  'attribute' => 'multimedia_idmultimedia',
            //  'format' => 'html',
            //  'label' => 'Imagen',
            //  'value' => function ($data) {
            //    $a =  ArrayHelper::map(Multimedia::find()->where(['=', 'inspeccion_idinspeccion', $data->idinspeccion])->all(),'idmultimedia','multimedia');

            //     foreach ($a as $obj) {
                        
            //            return Html::img('uploads/'.$data->nodoIdnodo->nombre.'-'.$data->idinspeccion.'/'. $obj,
            //            ['width' => '100px']);
            //      }   
                    
             // },
            //],
            
            
            
            [
                'attribute'=>'nodo_idnodo',
                'label' => 'Nodo',
                'value'=>'nodoIdnodo.nombre',
               
            ],
                     
=======

            [
                'attribute'=>'nodo_idnodo',
                'value'=>'nodoIdnodo.nombre',
               
            ],
                        
>>>>>>> origin/master
            
            'descripcion',
            'ptos_referencia',
            'fecha_asig',
            'fecha_insp',
<<<<<<< HEAD

=======
>>>>>>> origin/master
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
        ],

        'exportConfig'=> [
            GridView::EXCEL=>[
                'filename' => Yii::t('kvgrid', 'Appointments'),
                'showPageSummary' => true,
        ],
<<<<<<< HEAD

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
                Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Inspeccion', ['create'], ['class' => 'btn btn-warning'],['id'=>'modalButton']) 
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
        'heading'=>'<h3 class="panel-title">Inspecciones</h3>',
        'type'=>'warning',
             //'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Localidad', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Actualizar', ['index'], ['class' => 'btn btn-warning btn-sm']),
        'footer'=>true
       
        ],

=======

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
                Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Inspeccion', ['create'], ['class' => 'btn btn-warning'],['id'=>'modalButton']) 
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
        'heading'=>'<h3 class="panel-title">Inspecciones</h3>',
        'type'=>'warning',
             //'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Localidad', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Actualizar', ['index'], ['class' => 'btn btn-warning btn-sm']),
        'footer'=>true
       
        ],

>>>>>>> origin/master


    ]); ?>



<?= LinkPager::widget(['pagination'=>$dataProvider->pagination]);?>

<?php Pjax::end();?>



            

</div>
