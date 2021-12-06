<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absensi".
 *
 * @property int $id_absensi
 * @property string $tgl_absensi
 * @property int $id_murid
 * @property string $status_kehadiran
 *
 * @property Murid $idMur
 */
class Absensi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'absensi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_absensi', 'id_murid', 'status_kehadiran'], 'required'],
            [['tgl_absensi'], 'safe'],
            [['id_murid'], 'integer'],
            [['status_kehadiran'], 'string', 'max' => 10],
            [['id_murid','tgl_absensi'], 'unique', 'targetAttribute' => ['id_murid','tgl_absensi'],     'message' => 'Absensi Sudah Ada'],
            [['id_murid'], 'exist', 'skipOnError' => true, 'targetClass' => Murid::className(), 'targetAttribute' => ['id_murid' => 'id_murid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_absensi' => 'Id Absensi',
            'tgl_absensi' => 'Tgl Absensi',
            'id_murid' => 'Id Murid',
            'status_kehadiran' => 'Status Kehadiran',
        ];
    }

    /**
     * Gets query for [[IdMur]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMurid()
    {
        return $this->hasOne(Murid::className(), ['id_murid' => 'id_murid']);
    }
}
