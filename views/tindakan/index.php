<?php

use app\models\Dokter;
use app\models\Obat;
use app\models\Pasien;
use app\models\Tindakan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\TindakanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tindakan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tindakan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Tindakan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_tindakan',
            //'id_pasien',
            [
                'attribute' => 'id_pasien', //foreign key
                'value' => 'pasien.nama_pasien',
                'filter' => ArrayHelper::map(Pasien::find()->all(), 'id_pasien', 'nama_pasien'),
            ],
            // 'id_obat',
            [
                'attribute' => 'id_obat', //foreign key
                'value' => 'obat.nama_obat',
                'filter' => ArrayHelper::map(Obat::find()->all(), 'id_obat', 'nama_obat'),
            ],
            // 'id_dokter',
            [
                'attribute' => 'id_dokter', //foreign key
                'value' => 'dokter.nama_dokter',
                'filter' => ArrayHelper::map(Dokter::find()->all(), 'id_dokter', 'nama_dokter'),
            ],
            'jenis_tindakan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tindakan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_tindakan' => $model->id_tindakan]);
                 }
            ],
        ],
    ]); ?>


</div>
