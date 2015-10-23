<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstadoItemIsnpeccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estado Item Isnpeccions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-item-isnpeccion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estado Item Isnpeccion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'inspeccion_idinspeccion',
            'item_iditem',
            'fecha',
            'descrip_novedades',
            'estado_items',
            // 'valor_potencia_volt',
            // 'valor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
