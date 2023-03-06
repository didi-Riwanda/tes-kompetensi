<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Dokter $model */

$this->title = $model->nama_dokter;
$this->params['breadcrumbs'][] = ['label' => 'Dokter', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dokter-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_dokter' => $model->id_dokter], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_dokter' => $model->id_dokter], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_dokter',
            'nama_dokter',
            'alamat_dokter',
            'spesialis',
        ],
    ]) ?>

</div>
