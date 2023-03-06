<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Dokter;
use yii\helpers\ArrayHelper;

//ambil data dari model
$ar_dokter = ArrayHelper::map(Dokter::find()->asArray()->all(),'id_dokter','nama_dokter');

/** @var yii\web\View $this */
/** @var app\models\Pasien $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_datang')->textInput() ?>

    <?= $form->field($model, 'keluhan')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'id_dokter')->textInput() ?>

    <?= $form->field($model, 'id_dokter')->dropDownList(
            $ar_dokter,
            ['prompt'=>'--Select--']
        );
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
