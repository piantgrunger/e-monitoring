<?php
namespace app\models;

use Yii;
use yii\base\Model;

class ReportDetail extends Model
{
    public $id_murid;
    public $id_absensi;
    public $hasil_report;
    public $nisn;
    public $nama_murid;

    public function rules()
    {
        return [
                    [['id_murid', 'hasil_report'], 'required'],
                    [['id_murid','id_absensi'], 'integer'],
                    [['hasil_report','nama_murid','nisn'], 'string'],
                    [['id_murid'], 'exist', 'skipOnError' => true, 'targetClass' => Murid::className(), 'targetAttribute' => ['id_murid' => 'id_murid']],
                ];
    }

    public function attributeLabels()
    {
        return [
                    'id_murid' => 'Murid',
                    'hasil_report' => 'Hasil Report',
                ];
    }
}
