<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rawat_inap".
 *
 * @property int $id_rawat_inap
 * @property int $id_ruang
 * @property int $id_pasien
 *
 * @property Pasien $pasien
 * @property Ruang $ruang
 */
class RawatInap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rawat_inap';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ruang', 'id_pasien'], 'required'],
            [['id_ruang', 'id_pasien'], 'integer'],
            [['id_ruang'], 'exist', 'skipOnError' => true, 'targetClass' => Ruang::class, 'targetAttribute' => ['id_ruang' => 'id_ruang']],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['id_pasien' => 'id_pasien']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_rawat_inap' => 'Id Rawat Inap',
            'id_ruang' => 'Id Ruang',
            'id_pasien' => 'Id Pasien',
        ];
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id_pasien' => 'id_pasien']);
    }

    /**
     * Gets query for [[Ruang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRuang()
    {
        return $this->hasOne(Ruang::class, ['id_ruang' => 'id_ruang']);
    }
}
 