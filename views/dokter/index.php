<?php

use app\models\Dokter;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DokterSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Dokter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokter-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Dokter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_dokter',
            'nama_dokter',
            'alamat_dokter',
            'spesialis',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Dokter $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_dokter' => $model->id_dokter]);
                 }
            ],
        ],
    ]); ?>


</div>
