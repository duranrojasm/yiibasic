<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Radio;

/**
 * RadioSearch represents the model behind the search form about `app\models\Radio`.
 */
class RadioSearch extends Radio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idradio', 'periodo_mantenimiento'], 'integer'],
            [['observaciones', 'posicion_fisica', 'nombre', 'marca', 'serial', 'estatus', 'ubicacion_disp','estacion_idestaciondos', 'modelo_idmodelo', 'estacion_idestacion'], 'safe'],
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
        $query = Radio::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('modeloIdmodelo')->joinWith('estacionIdestacion0');

        $query->andFilterWhere([
            'idradio' => $this->idradio,
     
        ]);

        $query->andFilterWhere(['like', 'radio.observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'radio.posicion_fisica', $this->posicion_fisica])
            ->andFilterWhere(['like', 'radio.nombre', $this->nombre])
            ->andFilterWhere(['like', 'radio.marca', $this->marca])
            ->andFilterWhere(['like', 'radio.serial', $this->serial])
            ->andFilterWhere(['like', 'radio.estatus', $this->estatus])
            ->andFilterWhere(['like', 'radio.ubicacion_disp', $this->ubicacion_disp])
            ->andFilterWhere(['like', 'modelo.nombre',$this->modelo_idmodelo])
            ->andFilterWhere(['like', 'estacion.nombre', $this->estacion_idestacion])
            ->andFilterWhere(['like', 'estacion.nombre', $this->estacion_idestaciondos])
            ->andFilterWhere(['=', 'radio.periodo_mantenimiento', $this->periodo_mantenimiento]);

        return $dataProvider;
    }
}
