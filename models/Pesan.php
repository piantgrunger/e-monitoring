<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesan".
 *
 * @property int $id_pesan
 * @property int $id_penerima
 * @property int $id_pengirim
 * @property string $pesan
 *
 * @property User $penerima
 * @property User $pengirim
 */
class Pesan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pesan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penerima', 'id_pengirim', 'pesan'], 'required'],
            [['id_penerima', 'id_pengirim'], 'integer'],
            [['pesan'], 'string'],
            [['id_penerima'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_penerima' => 'id']],
            [['id_pengirim'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_pengirim' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pesan' => 'Id Pesan',
            'id_penerima' => 'Id Penerima',
            'id_pengirim' => 'Id Pengirim',
            'pesan' => 'Pesan',
        ];
    }

    /**
     * Gets query for [[Penerima]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenerima()
    {
        return $this->hasOne(User::className(), ['id' => 'id_penerima']);
    }

    /**
     * Gets query for [[Pengirim]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPengirim()
    {
        return $this->hasOne(User::className(), ['id' => 'id_pengirim']);
    }
}
