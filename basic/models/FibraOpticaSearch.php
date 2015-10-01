<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FibraOptica;

/**
 * FibraOpticaSearch represents the model behind the search form about `app\models\FibraOptica`.
 */
class FibraOpticaSearch extends FibraOptica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idfibra_optica', 'nodo_idnodo', 'estacion_idestacion', 'periodo_mantenimiento', 'estacion_idestaciondos', 'nodo_idnododos'], 'integer'],
            [['nombre', 'observacion'], 'safe'],
            [['distancia'], 'number'],
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
        $query = FibraOptica::find();

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
            'idfibra_optica' => $this->idfibra_optica,
            'nodo_idnodo' => $this->nodo_idnodo,
            'estacion_idestacion' => $this->estacion_idestacion,
            'distancia' => $this->distancia,
            'periodo_mantenimiento' => $this->periodo_mantenimiento,
            'estacion_idestaciondos' => $this->estacion_idestaciondos,
            'nodo_idnododos' => $this->nodo_idnododos,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
