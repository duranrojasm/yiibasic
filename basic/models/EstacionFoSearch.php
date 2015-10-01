<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstacionFo;

/**
 * EstacionFoSearch represents the model behind the search form about `app\models\EstacionFo`.
 */
class EstacionFoSearch extends EstacionFo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idestacion_fo', 'nodo_idnodo', 'fibra_optica_idfibra_optica', 'estacion_idestacion'], 'integer'],
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
        $query = EstacionFo::find();

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
            'idestacion_fo' => $this->idestacion_fo,
            'nodo_idnodo' => $this->nodo_idnodo,
            'fibra_optica_idfibra_optica' => $this->fibra_optica_idfibra_optica,
            'estacion_idestacion' => $this->estacion_idestacion,
        ]);

        return $dataProvider;
    }
}
