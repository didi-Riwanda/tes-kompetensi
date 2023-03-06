<?php

use app\models\Pasien;
use app\models\Pembayaran;
use app\models\Petugas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

//panggil model


/** @var yii\web\View $this */
/** @var app\models\PembayaranSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Pembayaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_pembayaran',
            //'petugas.nama_petugas',
            //'pasien.nama_pasien',
            [
                'attribute' => 'id_petugas', //foreign key
                'value' => 'petugas.nama_petugas',
                'filter' => ArrayHelper::map(Petugas::find()->all(), 'id_petugas', 'nama_petugas'),
            ],

            [
                'attribute' => 'id_pasien', //foreign key
                'value' => 'pasien.nama_pasien',
                'filter' => ArrayHelper::map(Pasien::find()->all(), 'id_pasien', 'nama_pasien'),
            ],

            'total_bayar',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pembayaran $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pembayaran' => $model->id_pembayaran]);
                 }
            ],
        ],
    ]); ?>


</div>
