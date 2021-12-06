<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laporan".
 *
 * @property int $id_laporan
 * @property string|null $laporan
 */
class Laporan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laporan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['laporan'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_laporan' => 'Id Laporan',
            'laporan' => 'Laporan',
        ];
    }
}
