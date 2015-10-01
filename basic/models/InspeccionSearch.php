<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inspeccion;

/**
 * InspeccionSearch represents the model behind the search form about `app\models\Inspeccion`.
 */
class InspeccionSearch extends Inspeccion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idinspeccion', 'nodo_idnodo', 'estacion_idestacion', 'radio_idradio'], 'integer'],
            [['descripcion', 'ptos_referencia', 'fecha_asig', 'fecha_insp', 'estatus'], 'safe'],
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
        $query = Inspeccion::find();

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
            'idinspeccion' => $this->idinspeccion,
            'nodo_idnodo' => $this->nodo_idnodo,
            'estacion_idestacion' => $this->estacion_idestacion,
            'fecha_asig' => $this->fecha_asig,
            'fecha_insp' => $this->fecha_insp,
            'radio_idradio' => $this->radio_idradio,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'ptos_referencia', $this->ptos_referencia])
            ->andFilterWhere(['like', 'estatus', $this->estatus]);

        return $dataProvider;
    }
}
