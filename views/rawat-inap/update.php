<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RawatInap $model */

$this->title = 'Update Rawat Inap: ' . $model->id_rawat_inap;
$this->params['breadcrumbs'][] = ['label' => 'Rawat Inaps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rawat_inap, 'url' => ['view', 'id_rawat_inap' => $model->id_rawat_inap]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rawat-inap-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
