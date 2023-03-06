<?php

use app\models\Petugas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PetugasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Petugas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="petugas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Petugas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_petugas',
            'nama_petugas',
            'alamat_petugas',
            'jam_jaga',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Petugas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_petugas' => $model->id_petugas]);
                 }
            ],
        ],
    ]); ?>


</div>
