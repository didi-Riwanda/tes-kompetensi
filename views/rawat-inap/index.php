<?php

use app\models\RawatInap;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;



/** @var yii\web\View $this */
/** @var app\models\RawatInapSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Rawat Inap';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rawat-inap-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Rawat Inap', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_rawat_inap',
            'id_ruang',
            'id_pasien',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RawatInap $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_rawat_inap' => $model->id_rawat_inap]);
                 }
            ],
        ],
    ]); ?>


</div>
