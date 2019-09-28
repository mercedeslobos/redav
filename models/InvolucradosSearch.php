<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Involucrados;

/**
 * InvolucradosSearch represents the model behind the search form of `app\models\Involucrados`.
 */
class InvolucradosSearch extends Involucrados
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'personas_id'], 'integer'],
            [['razon_social', 'licencia_nro'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Involucrados::find();

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
            'personas_id' => $this->personas_id,
        ]);

        $query->andFilterWhere(['like', 'razon_social', $this->razon_social])
            ->andFilterWhere(['like', 'licencia_nro', $this->licencia_nro]);

        return $dataProvider;
    }
}
