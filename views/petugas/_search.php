<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PetugasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="petugas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_petugas') ?>

    <?= $form->field($model, 'nama_petugas') ?>

    <?= $form->field($model, 'alamat_petugas') ?>

    <?= $form->field($model, 'jam_jaga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
