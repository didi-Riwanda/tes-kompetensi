<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\RawatInap $model */

$this->title = $model->id_rawat_inap;
$this->params['breadcrumbs'][] = ['label' => 'Rawat Inaps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rawat-inap-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_rawat_inap' => $model->id_rawat_inap], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_rawat_inap' => $model->id_rawat_inap], [
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
            'id_rawat_inap',
            'id_ruang',
            'id_pasien',
        ],
    ]) ?>

</div>
