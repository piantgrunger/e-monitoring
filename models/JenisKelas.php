<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_kelas".
 *
 * @property int $id
 * @property string $nama_kelas
 * @property string|null $keterangan
 */
class JenisKelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kelas'], 'required'],
            [['keterangan'], 'string'],
            [['nama_kelas'], 'string', 'max' => 100],
            [['nama_kelas'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_kelas' => 'Nama Kelas',
            'keterangan' => 'Keterangan',
        ];
    }
}
