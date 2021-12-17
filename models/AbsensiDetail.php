<?php
namespace app\models;

use Yii;
use yii\base\Model;

class AbsensiDetail extends Model
{
    public $id_murid;
    public $id_absensi;
    public $status_kehadiran;
    public $nisn;
    public $nama_murid;

    public function rules()
    {
        return [
                    [['id_murid', 'status_kehadiran'], 'required'],
                    [['id_murid','id_absensi'], 'integer'],
                    [['status_kehadiran','nama_murid','nisn'], 'string'],
                    [['id_murid'], 'exist', 'skipOnError' => true, 'targetClass' => Murid::className(), 'targetAttribute' => ['id_murid' => 'id_murid']],
                ];
    }

    public function attributeLabels()
    {
        return [
                    'id_murid' => 'Murid',
                    'status_kehadiran' => 'Status Kehadiran',
                ];
    }
}
