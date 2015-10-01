<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EquipoGeneral;

/**
 * EquipoGeneralSearch represents the model behind the search form about `app\models\EquipoGeneral`.
 */
class EquipoGeneralSearch extends EquipoGeneral
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idequipo_general'], 'integer'],
            [['nombre', 'marca', 'serial'], 'safe'],
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
        $query = EquipoGeneral::find();

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
            'idequipo_general' => $this->idequipo_general,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'serial', $this->serial]);

        return $dataProvider;
    }
}
