<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "petugas".
 *
 * @property int $id_petugas
 * @property string $nama_petugas
 * @property string $alamat_petugas
 * @property string $jam_jaga
 *
 * @property Pembayaran[] $pembayarans
 */
class Petugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'petugas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_petugas', 'alamat_petugas', 'jam_jaga'], 'required'],
            [['nama_petugas'], 'string', 'max' => 20],
            [['alamat_petugas'], 'string', 'max' => 50],
            [['jam_jaga'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_petugas' => 'Id Petugas',
            'nama_petugas' => 'Nama Petugas',
            'alamat_petugas' => 'Alamat Petugas',
            'jam_jaga' => 'Jam Jaga',
        ];
    }

    /**
     * Gets query for [[Pembayarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPembayarans()
    {
        return $this->hasMany(Pembayaran::class, ['id_petugas' => 'id_petugas']);
    }
}
