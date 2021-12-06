<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "murid".
 *
 * @property int $id_murid
 * @property string $nama_murid
 * @property string $nama_walimurid
 * @property string $alamat
 * @property string|null $no_hp
 * @property string $jenis_kelamin
 * @property string $tanggal_lahir
 * @property string $tempat_lahir
 * @property string $username
 * @property string $password
 */
class Murid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'murid';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_murid', 'nama_walimurid', 'alamat', 'jenis_kelamin', 'tanggal_lahir', 'tempat_lahir', 'username', 'password'], 'required'],
            [['alamat'], 'string'],
            [['tanggal_lahir'], 'safe'],
            [['nama_murid', 'nama_walimurid', 'tempat_lahir', 'username', 'password'], 'string', 'max' => 100],
            [['no_hp'], 'string', 'max' => 20],
            [['jenis_kelamin'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function afterSave($insert, $changedAttributes)
    {
        $user= User::find()->where(['username' => $this->username])->one();
        if (!$user) {
            $user = new User();
        }
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->auth_key = $this->id_murid;
        $user->jenis_user = 'murid';
        $user->save(false);
        $authAssignment = new AuthAssignment();
        $authAssignment->item_name = 'ortu';
        $authAssignment->user_id = $user->id;
        $authAssignment->save();
        
        parent::afterSave($insert, $changedAttributes);
    }
    public function attributeLabels()
    {
        return [
            'id_murid' => 'Id Murid',
            'nama_murid' => 'Nama Murid',
            'nama_walimurid' => 'Nama Walimurid',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
}
