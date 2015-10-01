<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InspeccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inspeccions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspeccion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inspeccion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idinspeccion',
            'nodo_idnodo',
            'estructur_eq_idestructur_eq',
            'estacion_idestacion',
            'descripcion',
            // 'ptos_referencia',
            // 'fecha_asig',
            // 'fecha_insp',
            // 'estatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
