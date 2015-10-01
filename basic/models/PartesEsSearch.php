<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PartesEs;

/**
 * PartesEsSearch represents the model behind the search form about `app\models\PartesEs`.
 */
class PartesEsSearch extends PartesEs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpartes_es', 'enlace_satelital_idenlace_satelital'], 'integer'],
            [['nombre', 'serial'], 'safe'],
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
        $query = PartesEs::find();

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
            'idpartes_es' => $this->idpartes_es,
            'enlace_satelital_idenlace_satelital' => $this->enlace_satelital_idenlace_satelital,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'serial', $this->serial]);

        return $dataProvider;
    }
}
