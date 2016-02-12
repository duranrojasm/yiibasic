<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MultimediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Multimedia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="multimedia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Multimedia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //IMAGEN DEL DOCUMENTO / IMAGEN
            [
              'attribute' => 'multimedia',
              'format' => 'html',
              'label' => 'ImageColumnLable',
              'value' => function ($data) {
                return Html::img('uploads/' . $data['multimedia'],
                ['width' => '100px']);
              },
            ],
 
            //NOMBRE + URL DEL DOCUMENTO / IMAGEN
            [
              'label'=>'File',
              'format' => 'raw',
              'value'=>function ($data) {
                  $url="uploads/".$data->multimedia;
                  return Html::a($data->multimedia, $url);
              },
            ],
            'idmultimedia:datetime',
            'detalle_proyecto_iddetalle_proyecto',
            'inspeccion_idinspeccion',
            'estacion_idestacion',
            'nodo_idnodo',
            // 'multimedia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
