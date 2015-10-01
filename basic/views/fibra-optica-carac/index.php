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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fibra Optica Carac', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'caracteristica_fo_idcaracteristica',
            'fibra_optica_idfibra_optica',
            'valor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
