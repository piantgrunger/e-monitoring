<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pesan;

/**
 * PesanSearch represents the model behind the search form of `app\models\Pesan`.
 */
class PesanSearch extends Pesan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pesan', 'id_penerima', 'id_pengirim'], 'integer'],
            [['pesan'], 'safe'],
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
        $query = Pesan::find();

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
            'id_pesan' => $this->id_pesan,
            'id_penerima' => $this->id_penerima,
            'id_pengirim' => $this->id_pengirim,
        ]);

        $query->andFilterWhere(['like', 'pesan', $this->pesan]);

        return $dataProvider;
    }
}
