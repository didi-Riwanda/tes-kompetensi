<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dokter".
 *
 * @property int $id_dokter
 * @property string $nama_dokter
 * @property string $alamat_dokter
 * @property string $spesialis
 *
 * @property Pasien[] $pasiens
 */
class Dokter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_dokter', 'alamat_dokter', 'spesialis'], 'required'],
            [['nama_dokter', 'alamat_dokter', 'spesialis'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_dokter' => 'Id Dokter',
            'nama_dokter' => 'Nama Dokter',
            'alamat_dokter' => 'Alamat Dokter',
            'spesialis' => 'Spesialis',
        ];
    }

    /**
     * Gets query for [[Pasiens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasiens()
    {
        return $this->hasMany(Pasien::class, ['id_dokter' => 'id_dokter']);
    }

    //Highchart from 2amigos
    public static function grafikDokter()
    {
        // $sql = "SELECT nama_obat FROM obat";
        // $rs = Yii::$app->db->createCommand($sql)->queryAll();
        // return $rs;
    }
}
