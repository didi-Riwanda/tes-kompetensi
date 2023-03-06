<?php

use app\models\Ruang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RuangSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ruang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruang-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Ruang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_ruang',
            'nama_ruang',
            'nama_gedung',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Ruang $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_ruang' => $model->id_ruang]);
                 }
            ],
        ],
    ]); ?>


</div>
