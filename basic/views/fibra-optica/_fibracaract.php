<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FibraOpticaCaracSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fibra Optica Caracs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fibra-optica-carac-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           
            [
                'attribute'=>'caracteristica_fo_idcaracteristica',
                'value'=>'caracteristicaFoIdcaracteristica.nombre',
               
            ],
            
            'valor',

           
        ],
    ]); ?>

</div>