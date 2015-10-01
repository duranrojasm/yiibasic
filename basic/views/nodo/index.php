<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NodoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nodos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nodo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Nodo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idnodo',
            'coordenada_idcoordenada',
            'estacion_idestacion',
            'tipo',
            'nombre',
            // 'direccion',
            // 'identificacion',
            // 'contacto_red',
            // 'contacto_mant',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
