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
            [['idfibra_optica', 'periodo_mantenimiento'], 'integer'],
            [['nombre', 'observacion', 'nodo_idnodo', 'estacion_idestacion', 'estacion_idestaciondos', 'nodo_idnododos'], 'safe'],
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

         $query->joinWith('estacionIdestacion')->joinWith(['nodoIdnodo']);


        $query->andFilterWhere([
            'idfibra_optica' => $this->idfibra_optica,
            
           
            'nodo_idnododos' => $this->nodo_idnododos,
        ]);

        $query->andFilterWhere(['like', 'fibra_optica.nombre', $this->nombre])
            ->andFilterWhere(['like', 'fibra_optica.observacion', $this->observacion])
            ->andFilterWhere(['=', 'fibra_optica.distancia', $this->distancia])
             ->andFilterWhere(['=', 'fibra_optica.periodo_mantenimiento', $this->periodo_mantenimiento])
            ->andFilterWhere(['like', 'estacion.nombre', $this->estacion_idestaciondos])
             ->andFilterWhere(['like', 'estacion.nombre', $this->estacion_idestacion])
              ->andFilterWhere(['like', 'nodo.nombre', $this->nodo_idnodo]);
           
         

        return $dataProvider;
    }
}
