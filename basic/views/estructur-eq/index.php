<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use yii\grid\GridView;
use kartik\grid\GridView;
use app\models\HiloSearch;
use kartik\select2\Select2;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstructurEqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estructur Eqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estructur-eq-index">




<?php Pjax::begin(['id'=>'localGrid', 'timeout' => false, 
'enablePushState' => false]);?>
    <?= GridView::widget([
        'id'=>'local',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
         'columns' =>  [ 
            ['class' => 'kartik\grid\SerialColumn',
               'contentOptions' => ['style' => 'width: 30px;', 'class' => 'text-center'],
            ],
          

            //'idlocalidad',
            //'localidadIdlocalidad.nombre',
            // COMO AGREGAR AUTOCOMPLETAR EN FILTROS OJO
           /*  [
                'attribute'=>'nombre',
                 'value'=>'nombre',
                 'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(Localidad::find()->orderBy('nombre')->asArray()->all(), 'idlocalidad','nombre'), 
                'filterWidgetOptions'=>[
                
                  'pluginOptions' =>['allowClear' =>true]
                   ],
                'filterInputOptions'=>['placeholder'=>'Lugar'],
                'format'=>'raw'
               
            ],*/
            [
                'attribute'=> 'radio_idradio',
                'value'=>'radioIdradio.serial',
                'label'=>'Serial',
               
            ],
            [
                'attribute'=> 'radio_idradio',
                'value'=>'radioIdradio.nombre',
                'label'=>'Radio',
               
            ],
             [
                'attribute'=> 'estructura_idestructura',
                'value'=>'estructuraIdestructura.nombre',
                'label'=>'Estructura',
               
            ],

            'fecha',

          
        ],
        
         'pjax'=>true,
         'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjaxSettings'=>[
           'neverTimeout'=>true,
            //'loadingCssClass'=>true,
           
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
        'heading'=>'<h3 class="panel-title">Radios Ubicación</h3>',
        'type'=>'warning',
           //  'before'=>Html::a('<i></i> Ubicación Radios', ['/estructur-eq/index'], ['class' => 'btn btn-warning btn-sm']),
            'after'=>Html::a('<i></i> Regresar', ['/radio/index'], ['class' => 'btn btn-warning btn-sm']),
        'footer'=>true
       
        ],



    ]); ?>



<?= LinkPager::widget(['pagination'=>$dataProvider->pagination]);?>

<?php Pjax::end();?>



</div>
