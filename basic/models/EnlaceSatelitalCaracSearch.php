<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EnlaceSatelitalCarac;

/**
 * EnlaceSatelitalCaracSearch represents the model behind the search form about `app\models\EnlaceSatelitalCarac`.
 */
class EnlaceSatelitalCaracSearch extends EnlaceSatelitalCarac
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idenlace_satelital_carac', 'caracteristica_es_idcaracteristica', 'enlace_satelital_idenlace_satelital'], 'integer'],
            [['valor'], 'safe'],
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
        $query = EnlaceSatelitalCarac::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idenlace_satelital_carac' => $this->idenlace_satelital_carac,
            'caracteristica_es_idcaracteristica' => $this->caracteristica_es_idcaracteristica,
            'enlace_satelital_idenlace_satelital' => $this->enlace_satelital_idenlace_satelital,
        ]);

        $query->andFilterWhere(['like', 'valor', $this->valor]);

        return $dataProvider;
    }
}
