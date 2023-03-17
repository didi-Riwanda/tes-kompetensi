<?php

use app\models\Dokter;
use app\models\Obat;
use app\models\Pasien;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//ambil data dari model
$ar_pasien = ArrayHelper::map(Pasien::find()->asArray()->all(),'id_pasien','nama_pasien');
$ar_obat = ArrayHelper::map(Obat::find()->asArray()->all(),'id_obat','nama_obat');
$ar_dokter = ArrayHelper::map(Dokter::find()->asArray()->all(),'id_dokter','nama_dokter');

/** @var yii\web\View $this */
/** @var app\models\Tindakan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tindakan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'id_pasien')->textInput() ?>

    <?= $form->field($model, 'id_pasien')->dropDownList(
            $ar_pasien,
            ['prompt'=>'--Select--']
        );
    ?>

    <?php //$form->field($model, 'id_obat')->textInput() ?>

    <?= $form->field($model, 'id_obat')->dropDownList(
            $ar_obat,
            ['prompt'=>'--Select--']
        );
    ?>

    <?php //$form->field($model, 'id_dokter')->textInput() ?>

    <?= $form->field($model, 'id_dokter')->dropDownList(
            $ar_dokter,
            ['prompt'=>'--Select--']
        );
    ?>

    <?= $form->field($model, 'jenis_tindakan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
