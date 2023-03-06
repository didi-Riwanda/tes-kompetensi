<?php

use app\models\Pasien;
use app\models\Petugas;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//ambil data dari model
$ar_petugas = ArrayHelper::map(Petugas::find()->asArray()->all(),'id_petugas','nama_petugas');
$ar_pasien = ArrayHelper::map(Pasien::find()->asArray()->all(),'id_pasien','nama_pasien');

/** @var yii\web\View $this */
/** @var app\models\Pembayaran $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pembayaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'id_petugas')->textInput() ?>

    <?php //$form->field($model, 'id_pasien')->textInput() ?>

    <?= $form->field($model, 'id_petugas')->dropDownList(
            $ar_petugas,
            ['prompt'=>'--Select--']
        );
    ?>

    <?= $form->field($model, 'id_pasien')->dropDownList(
            $ar_pasien,
            ['prompt'=>'--Select--']
        );
    ?>

    <?= $form->field($model, 'total_bayar')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
