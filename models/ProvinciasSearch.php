<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Provincias;

/**
 * ProvinciasSearch represents the model behind the search form of `app\models\Provincias`.
 */
class ProvinciasSearch extends Provincias
{
    public $nombrepais;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['provincia','pais_id'], 'safe'],
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
        $query = Provincias::find();

        // add conditions that should always apply here
        $query->joinWith(['pais']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['nombrepais']=[
            'asc'=>['pais'=>SORT_ASC],
            'desc'=>['pais'=>SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'pais_id' => $this->pais_id,
        ]);

        $query->andFilterWhere(['like', 'provincia', $this->provincia])
              ->andFilterWhere(['like', 'paises.pais', $this->pais_id]);
        return $dataProvider;
    }
}
