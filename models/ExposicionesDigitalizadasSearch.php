<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ExposicionesDigitalizadas;

/**
 * ExposicionesDigitalizadasSearch represents the model behind the search form of `app\models\ExposicionesDigitalizadas`.
 */
class ExposicionesDigitalizadasSearch extends ExposicionesDigitalizadas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nro_exposicion'], 'integer'],
            [['archivo', 'fecha_siniestro'], 'safe'],
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
        $query = ExposicionesDigitalizadas::find();

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
            'fecha_siniestro' => $this->fecha_siniestro,
            'nro_exposicion' => $this->nro_exposicion,
        ]);

        $query->andFilterWhere(['like', 'archivo', $this->archivo]);

        return $dataProvider;
    }
}
