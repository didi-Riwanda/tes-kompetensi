<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Ruang $model */

$this->title = $model->nama_gedung;
$this->params['breadcrumbs'][] = ['label' => 'Ruang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ruang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_ruang' => $model->id_ruang], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_ruang' => $model->id_ruang], [
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
            //'id_ruang',
            'nama_ruang',
            'nama_gedung',
        ],
    ]) ?>

</div>
