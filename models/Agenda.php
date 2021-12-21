<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "agenda".
 *
 * @property int $id
 * @property string $tanggal
 * @property string $agenda
 * @property string|null $file
 */
class Agenda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    
    private $_old_file;
    private $_berkas = ['file'];

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
        return 'agenda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'agenda'], 'required'],
            [['tanggal'], 'safe'],
            [['agenda'], 'string'],
            [['file'],'file' ,  'extensions' => 'jpeg,jpg,png,mp4,mp3,mkv' , 'maxSize' => 1024 * 1024 * 50, 'tooBig' => 'File lebih dari 50MB'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'agenda' => 'Agenda',
            'file' => 'File',
        ];
    }
}
