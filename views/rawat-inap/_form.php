<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ruang;
use app\models\Pasien;
use yii\helpers\ArrayHelper;

//ambil data dari model
$ar_ruang = ArrayHelper::map(Ruang::find()->asArray()->all(),'id_ruang','nama_ruang');
$ar_pasien = ArrayHelper::map(Pasien::find()->asArray()->all(),'id_pasien','nama_pasien');

/** @var yii\web\View $this */
/** @var app\models\RawatInap $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="rawat-inap-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'id_ruang')->textInput() ?>

    <?php //$form->field($model, 'id_pasien')->textInput() ?>

    <?= $form->field($model, 'id_ruang')->dropDownList(
            $ar_ruang,
            ['prompt'=>'--Select--']
        );
    ?>

    <?= $form->field($model, 'id_pasien')->dropDownList(
            $ar_pasien,
            ['prompt'=>'--Select--']
        );
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
