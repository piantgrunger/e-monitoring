<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guru".
 *
 * @property int $id_guru
 * @property string $nama_guru
 * @property string $alamat
 * @property string|null $no_hp
 * @property string $jenis_kelamin
 * @property string $username
 * @property string $password
 */
class Guru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guru';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_guru', 'alamat', 'jenis_kelamin', 'username', 'password'], 'required'],
            [['alamat'], 'string'],
            [['nama_guru', 'username', 'password'], 'string', 'max' => 100],
            [['no_hp'], 'string', 'max' => 20],
            [['jenis_kelamin'], 'string', 'max' => 10],
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        $user= User::find()->where(['username' => $this->username])->one();
        if (!$user) {
            $user = new User();
        }
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->auth_key = $this->id_guru;
        $user->jenis_user = 'guru';
        $user->save(false);
        $authAssignment = new AuthAssignment();
        $authAssignment->item_name = 'guru';
        $authAssignment->user_id = $user->id;
        $authAssignment->save();
        
        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_guru' => 'Id Guru',
            'nama_guru' => 'Nama Guru',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
            'jenis_kelamin' => 'Jenis Kelamin',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
}
