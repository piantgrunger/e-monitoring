<?php

namespace app\models;

use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "raport".
 *
 * @property int $id_raport
 * @property int $id_murid
 * @property string $hasil_raport
 * @property string $file_raport
 *
 * @property Murid $idMur
 */
class Raport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

     

    private $_old_file;
    private $_berkas = ['file_raport'];

    public function saveOld()
    {
        foreach ($this->_berkas as $file) {
            $this->_old_file[$file] = $this->$file;
        }
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            foreach ($this->_berkas as $file) {
                $this->upload($file);
            }
        }
            
        return true;
    }


     
    public function upload($fieldName)
    {
        $path = Yii::getAlias('@app') . '/web/uploads/';
        //s  die($fieldName);
        $image = UploadedFile::getInstance($this, $fieldName);
        if (!empty($image) && $image->size !== 0) {
            $fileNames = $fieldName .(md5(date('Y-m-d h:n:s'))) . '.' . $image->extension;

            if ($image->saveAs($path . $fileNames)) {
                $this->attributes = [$fieldName => $fileNames];
                return true;
            } else {
                return false;
                $this->attributes = [$fieldName => $this->_old_file[$fieldName]];
            }
        } else {
            $this->attributes = [$fieldName => $this->_old_file[$fieldName]];
            return true;
        }
    }
    
    public static function tableName()
    {
        return 'raport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_murid', 'hasil_raport'], 'required'],
            [['id_murid'], 'integer'],
            [['hasil_raport'], 'string'],
            [['file_raport'], 'file', 'extensions' => 'pdf, doc, docx,xls ,xlsx ' , 'maxSize' => 1024 * 1024 * 5, 'tooBig' => 'File lebih dari 5MB'],
            
            
            [['id_murid'], 'exist', 'skipOnError' => true, 'targetClass' => Murid::className(), 'targetAttribute' => ['id_murid' => 'id_murid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_raport' => 'Id Raport',
            'id_murid' => 'Id Murid',
            'hasil_raport' => 'Hasil Raport',
            'file_raport' => 'File Raport',
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
