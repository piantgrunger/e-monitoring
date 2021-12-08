<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Absensi;

/**
 * AbsensiSearch represents the model behind the search form of `app\models\Absensi`.
 */
class AbsensiSearch extends Absensi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_absensi', 'id_murid'], 'integer'],
            [['tgl_absensi', 'status_kehadiran'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Absensi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_absensi' => $this->id_absensi,
            'tgl_absensi' => $this->tgl_absensi,
            'id_murid' => $this->id_murid,
        ]);
        
        if (Yii::$app->user->identity->jenis_user =='murid') {
            $query->andFilterWhere([ 'id_murid', Yii::$app->user->identity->auth_key]);
        }

        $query->andFilterWhere(['like', 'status_kehadiran', $this->status_kehadiran]);

        return $dataProvider;
    }
}
