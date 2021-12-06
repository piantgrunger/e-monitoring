<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property int $id_report
 * @property int $id_murid
 * @property string $tgl_report
 * @property string $hasil_report
 *
 * @property Murid $idMur
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_murid', 'tgl_report', 'hasil_report'], 'required'],
            [['id_murid'], 'integer'],
            [['tgl_report'], 'safe'],
            [['hasil_report'], 'string'],
            [['id_murid'], 'exist', 'skipOnError' => true, 'targetClass' => Murid::className(), 'targetAttribute' => ['id_murid' => 'id_murid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_report' => 'Id Report',
            'id_murid' => 'Id Murid',
            'tgl_report' => 'Tgl Report',
            'hasil_report' => 'Hasil Report',
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
