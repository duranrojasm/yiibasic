<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\export\ExportMenu;


/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Localidades';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="localidad-index">


 <?php $gridColumns =[
            ['class' => 'yii\grid\SerialColumn'],
                              
            'localidadIdlocalidad.nombre',
            'nombre',
            'tipo',  
            ]; ?>



<?php echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
     'target' => ExportMenu::TARGET_BLANK,
     'exportConfig' => [
        ExportMenu::FORMAT_PDF => false,
                ]
]);?>


 <!--<?= $this->render('_form', [
        'model' => $model,
    ]) ?>
-->
<?php Pjax::begin(['id'=>'localGrid', 'timeout' => false, 
'enablePushState' => false]);?>
    <?= GridView::widget([
        'id'=>'local',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
         'columns' =>  [
            ['class' => 'yii\grid\SerialColumn',
               'contentOptions' => ['style' => 'width: 30px;', 'class' => 'text-center'],
            ],
            [
                'attribute'=>'localidad_idlocalidad',
                'value'=>'localidadIdlocalidad.nombre',
               // 'contentOptions' => ['style' => 'width: 30px;', 'class' => 'text-center'],
            ],

            //'idlocalidad',
            //'localidadIdlocalidad.nombre',
            'nombre',
            'tipo',


             ['class' => 'yii\grid\ActionColumn',
              'contentOptions' => ['style' => 'width: 100px;', 'class' => 'text-center'],
                'template' => '{view}{update}{delete}{javi_button}',
                'buttons' => ['javi_button' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-pushpin"></span>',['create']);
                        }],
                ],
        ],
        // 'export'=>false,
       //  'pjax'=>true,
         'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'pjaxSettings'=>[
           'neverTimeout'=>true,
            //'loadingCssClass'=>true,
           
             ],

         'exportConfig'=> [
        GridView::EXCEL=>[
                'filename' => Yii::t('kvgrid', 'Appointments'),
                    'showPageSummary' => true,
                ]
            ],

        'toolbar' => [
        [
            'content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Localidad', ['create'], ['class' => 'btn btn-warning'],['id'=>'modalButton']) 
                . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-link']),
           
        ],
        '{export}',
//      '{toggleData}'
        ],

 //      'toggleDataContainer' => ['class' => 'btn-group-sm'],
        //'export'=>true,
        'exportContainer' => ['class' => 'btn-group-sm'],
        'layout'=>"{summary}\n{items}\n{pager}",
        'responsiveWrap'=>false,
        'resizableColumns'=>true,
        'bootstrap' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover'=>true,

        'pager' => [
//                      'firstPageLabel' => 'First Page',
//                      'lastPageLabel' => 'Last Page',
                  'class' => '\yii\widgets\LinkPager',
 //                       'class' => 'app\widgets\DropdownPager',
                //other pager config if nesessary
                ],


        'panel' => [
        'heading'=>'<h3 class="panel-title">Localidades</h3>',
        'type'=>'warning',
             //'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Crear Localidad', ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Actualizar', ['index'], ['class' => 'btn btn-warning btn-sm']),
        'footer'=>false
        ],



    ]); ?>


<?= LinkPager::widget(['pagination'=>$dataProvider->pagination]);?>

<?php Pjax::end();?>

         

</div>
