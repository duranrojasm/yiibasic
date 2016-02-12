<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FibraOpticaCaracSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inspeccion Estado';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspeccion-create">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

        'valorrau',
           
            [
                'attribute'=>'caracteristicasrad_idcaracteristicas',
                'value'=>'caracteristicasradIdcaracteristicas.nombre',
                   
            ],



                      

            'valor',

             

           
        ],
    ]); ?>

</div>

