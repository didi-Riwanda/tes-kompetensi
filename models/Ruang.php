<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ruang".
 *
 * @property int $id_ruang
 * @property string $nama_ruang
 * @property string $nama_gedung
 *
 * @property RawatInap[] $rawatInaps
 */
class Ruang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ruang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_ruang', 'nama_gedung'], 'required'],
            [['nama_ruang'], 'string', 'max' => 20],
            [['nama_gedung'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ruang' => 'Id Ruang',
            'nama_ruang' => 'Nama Ruang',
            'nama_gedung' => 'Nama Gedung',
        ];
    }

    /**
     * Gets query for [[RawatInaps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRawatInaps()
    {
        return $this->hasMany(RawatInap::class, ['id_ruang' => 'id_ruang']);
    }
}
