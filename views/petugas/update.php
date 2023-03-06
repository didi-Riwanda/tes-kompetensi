<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Petugas $model */

$this->title = 'Update Petugas: ' . $model->nama_petugas;
$this->params['breadcrumbs'][] = ['label' => 'Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_petugas, 'url' => ['view', 'id_petugas' => $model->id_petugas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="petugas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
