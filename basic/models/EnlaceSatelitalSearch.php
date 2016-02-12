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
            [['idenlace_satelital', 'num_antena', 'periodo_mantenimiento'], 'integer'],
            [['codigo', 'nombre', 'estatus', 'ubicacion_disp', 'torre_idtorre', 'cliente_idcliente', 'estacion_idestacion', 'estacion_idestaciondos'], 'safe'],
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

        $query->joinWith('torreIdtorre')->joinWith('clienteIdcliente')->joinWith('estacionIdestacion');

        $query->andFilterWhere([
            'idenlace_satelital' => $this->idenlace_satelital,

        ]);

        $query->andFilterWhere(['like', 'enlace_satelital.codigo', $this->codigo])
            ->andFilterWhere(['like', 'enlace_satelital.nombre', $this->nombre])
            ->andFilterWhere(['like', 'enlace_satelital.ubicacion_disp', $this->ubicacion_disp])
            ->andFilterWhere(['=', 'enlace_satelital.num_antena', $this->num_antena])
            ->andFilterWhere(['=', 'enlace_satelital.periodo_mantenimiento', $this->periodo_mantenimiento])
            ->andFilterWhere(['like', 'torre.codigo',$this->torre_idtorre])
            ->andFilterWhere(['like', 'cliente.nombre', $this->cliente_idcliente])
            ->andFilterWhere(['like', 'estacion.nombre', $this->estacion_idestacion]);

        return $dataProvider;
    }
}
