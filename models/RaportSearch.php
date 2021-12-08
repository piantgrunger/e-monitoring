<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Raport;

/**
 * RaportSearch represents the model behind the search form of `app\models\Raport`.
 */
class RaportSearch extends Raport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_raport', 'id_murid'], 'integer'],
            [['hasil_raport', 'file_raport'], 'safe'],
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
        $query = Raport::find();

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
            'id_raport' => $this->id_raport,
            'id_murid' => $this->id_murid,
        ]);

        $query->andFilterWhere(['like', 'hasil_raport', $this->hasil_raport])
            ->andFilterWhere(['like', 'file_raport', $this->file_raport]);

        if (Yii::$app->user->identity->jenis_user =='murid') {
            $query->andFilterWhere([ 'id_murid', Yii::$app->user->identity->auth_key]);
        }

        return $dataProvider;
    }
}
