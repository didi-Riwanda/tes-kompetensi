<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id_pasien
 * @property string $nama_pasien
 * @property string $alamat
 * @property string $tgl_datang
 * @property string $keluhan
 * @property int $id_dokter
 *
 * @property Dokter $dokter
 * @property Pembayaran[] $pembayarans
 * @property RawatInap[] $rawatInaps
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pasien', 'alamat', 'tgl_datang', 'keluhan', 'id_dokter'], 'required'],
            [['tgl_datang'], 'safe'],
            [['id_dokter'], 'integer'],
            [['nama_pasien', 'alamat'], 'string', 'max' => 50],
            [['keluhan'], 'string', 'max' => 255],
            [['id_dokter'], 'exist', 'skipOnError' => true, 'targetClass' => Dokter::class, 'targetAttribute' => ['id_dokter' => 'id_dokter']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pasien' => 'Id Pasien',
            'nama_pasien' => 'Nama Pasien',
            'alamat' => 'Alamat',
            'tgl_datang' => 'Tgl Datang',
            'keluhan' => 'Keluhan',
            'id_dokter' => 'Nama Dokter',
        ];
    }

    /**
     * Gets query for [[Dokter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDokter()
    {
        return $this->hasOne(Dokter::class, ['id_dokter' => 'id_dokter']);
    }

    /**
     * Gets query for [[Pembayarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPembayarans()
    {
        return $this->hasMany(Pembayaran::class, ['id_pasien' => 'id_pasien']);
    }

    /**
     * Gets query for [[RawatInaps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRawatInaps()
    {
        return $this->hasMany(RawatInap::class, ['id_pasien' => 'id_pasien']);
    }
}
