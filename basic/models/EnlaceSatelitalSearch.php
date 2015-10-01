<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EnlaceSatelital;

/**
 * EnlaceSatelitalSearch represents the model behind the search form about `app\models\EnlaceSatelital`.
 */
class EnlaceSatelitalSearch extends EnlaceSatelital
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idenlace_satelital', 'torre_idtorre', 'cliente_idcliente', 'estacion_idestacion', 'num_antena', 'periodo_mantenimiento', 'estacion_idestaciondos'], 'integer'],
            [['codigo', 'nombre', 'estatus', 'ubicacion_disp'], 'safe'],
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
        $query = EnlaceSatelital::find();

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
            'idenlace_satelital' => $this->idenlace_satelital,
            'torre_idtorre' => $this->torre_idtorre,
            'cliente_idcliente' => $this->cliente_idcliente,
            'estacion_idestacion' => $this->estacion_idestacion,
            'num_antena' => $this->num_antena,
            'periodo_mantenimiento' => $this->periodo_mantenimiento,
            'estacion_idestaciondos' => $this->estacion_idestaciondos,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'estatus', $this->estatus])
            ->andFilterWhere(['like', 'ubicacion_disp', $this->ubicacion_disp]);

        return $dataProvider;
    }
}
