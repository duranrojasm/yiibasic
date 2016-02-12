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

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioReportefSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario Reportefs';

?>
<div class="usuario-reportef-index">

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary'=>'', 
        //'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

          //  'reporte_falla_idreporte_falla',
             [
                'attribute'=>'usuario_idusuario',
                'value'=>'usuarioIdusuario.nombre',
               
            ],
            
            'cargo',

              [
                'attribute'=>'vehiculo',
                'value'=>'vehiculo0.control',
               
            ],

            ['class' => 'yii\grid\ActionColumn',
              'contentOptions' => ['style' => 'width: 100px;', 'class' => 'text-center'],
                'template' => '{javi_button}',
                'buttons' => ['javi_button' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-pushpin"></span>',['usuario-reportef/index']);
                        }],
                ],
        ],
         'bootstrap' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover'=>true,

    ]); ?>

</div>
