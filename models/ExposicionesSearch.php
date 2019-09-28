<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Exposiciones;

/**
 * ExposicionesSearch represents the model behind the search form of `app\models\Exposiciones`.
 */
class ExposicionesSearch extends Exposiciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nro', 'policias_id', 'siniestros_id'], 'integer'],
            [['fecha', 'participa_division'], 'safe'],
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
        $query = Exposiciones::find();

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
            'nro' => $this->nro,
            'fecha' => $this->fecha,
            'policias_id' => $this->policias_id,
            'siniestros_id' => $this->siniestros_id,
        ]);

        $query->andFilterWhere(['like', 'participa_division', $this->participa_division]);

        return $dataProvider;
    }
}
