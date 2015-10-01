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
            [['idradio', 'modelo_idmodelo', 'estacion_idestacion', 'periodo_mantenimiento', 'estacion_idestaciondos'], 'integer'],
            [['observaciones', 'posicion_fisica', 'nombre', 'marca', 'serial', 'estatus', 'ubicacion_disp'], 'safe'],
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

        $query->andFilterWhere([
            'idradio' => $this->idradio,
            'modelo_idmodelo' => $this->modelo_idmodelo,
            'estacion_idestacion' => $this->estacion_idestacion,
            'periodo_mantenimiento' => $this->periodo_mantenimiento,
            'estacion_idestaciondos' => $this->estacion_idestaciondos,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'posicion_fisica', $this->posicion_fisica])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'estatus', $this->estatus])
            ->andFilterWhere(['like', 'ubicacion_disp', $this->ubicacion_disp]);

        return $dataProvider;
    }
}
