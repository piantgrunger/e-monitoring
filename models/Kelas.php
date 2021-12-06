<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelas".
 *
 * @property int $id_kelas
 * @property int $id_murid
 * @property int $id_guru
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_murid', 'id_guru'], 'required'],
            [['id_murid', 'id_guru'], 'integer'],
            [['id_murid', 'id_guru'], 'unique', 'targetAttribute' => ['id_murid', 'id_guru'] , 'message' => 'Kelas Murid  sudah ada'],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kelas' => 'Id Kelas',
            'id_murid' => 'Id Murid',
            'id_guru' => 'Id Guru',
        ];
    }

    public function getMurid()
    {
        return $this->hasOne(Murid::className(), ['id_murid' => 'id_murid']);
    }

    public function getGuru()
    {
        return $this->hasOne(Guru::className(), ['id_guru' => 'id_guru']);
    }
}
