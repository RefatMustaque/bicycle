<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BicycleInfo;

/**
 * BicycleInfoSearch represents the model behind the search form about `backend\models\BicycleInfo`.
 */
class BicycleInfoSearch extends BicycleInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'price', 'quantity'], 'integer'],
            [['bicycle_model', 'brand', 'description', 'type', 'type_description'], 'safe'],
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
        $query = BicycleInfo::find();

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
            'id' => $this->id,
            'price' => $this->price,
            'quantity' => $this->quantity,
        ]);

        $query->andFilterWhere(['like', 'bicycle_model', $this->bicycle_model])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'description', $this->description]);
            //->andFilterWhere(['like', 'type_description', $this->type_description]);

        return $dataProvider;
    }
}
