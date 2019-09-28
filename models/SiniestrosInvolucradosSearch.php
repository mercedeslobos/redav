<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SiniestrosInvolucrados;

/**
 * SiniestrosInvolucradosSearch represents the model behind the search form of `app\models\SiniestrosInvolucrados`.
 */
class SiniestrosInvolucradosSearch extends SiniestrosInvolucrados
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'siniestros_id', 'involucrados_id', 'vehiculos_id'], 'integer'],
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
        $query = SiniestrosInvolucrados::find();

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
            'siniestros_id' => $this->siniestros_id,
            'involucrados_id' => $this->involucrados_id,
            'vehiculos_id' => $this->vehiculos_id,
        ]);

        return $dataProvider;
    }
}
