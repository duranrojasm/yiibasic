<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioImpSegdadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario Imp Segdads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-imp-segdad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario Imp Segdad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idusuario_imp_segdad',
            'implemento_segurd_idimplemento_segurd',
            'usuario_idusuario',
            'fecha',
            'cantidad_req',
            // 'cantidad_tiene',
            // 'observacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
