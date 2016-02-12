<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioInspeccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario Inspeccions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-inspeccion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario Inspeccion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'inspeccion_idinspeccion',
            'usuario_idusuario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
