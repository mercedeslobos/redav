<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vehiculos;

/**
 * VehiculosSearch represents the model behind the search form of `app\models\Vehiculos`.
 */
class VehiculosSearch extends Vehiculos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'aseguradora_id'], 'integer'],
            [['tipo', 'marca', 'modelo', 'dominio', 'nro_motor', 'nro_chasis', 'nro_poliza', 'tipo_transporte', 'uso', 'tipo_carga', 'carga_asegurada', 'circulacion', 'observaciones', 'desperfectos'], 'safe'],
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
        $query = Vehiculos::find();

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
            'aseguradora_id' => $this->aseguradora_id,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'dominio', $this->dominio])
            ->andFilterWhere(['like', 'nro_motor', $this->nro_motor])
            ->andFilterWhere(['like', 'nro_chasis', $this->nro_chasis])
            ->andFilterWhere(['like', 'nro_poliza', $this->nro_poliza])
            ->andFilterWhere(['like', 'tipo_transporte', $this->tipo_transporte])
            ->andFilterWhere(['like', 'uso', $this->uso])
            ->andFilterWhere(['like', 'tipo_carga', $this->tipo_carga])
            ->andFilterWhere(['like', 'carga_asegurada', $this->carga_asegurada])
            ->andFilterWhere(['like', 'circulacion', $this->cirulacion])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'desperfectos', $this->desperfectos]);

        return $dataProvider;
    }
}
