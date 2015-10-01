<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Multimedia;

/**
 * MultimediaSearch represents the model behind the search form about `app\models\Multimedia`.
 */
class MultimediaSearch extends Multimedia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmultimedia', 'detalle_proyecto_iddetalle_proyecto', 'inspeccion_idinspeccion', 'estacion_idestacion', 'nodo_idnodo', 'multimedia'], 'integer'],
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
        $query = Multimedia::find();

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
            'idmultimedia' => $this->idmultimedia,
            'detalle_proyecto_iddetalle_proyecto' => $this->detalle_proyecto_iddetalle_proyecto,
            'inspeccion_idinspeccion' => $this->inspeccion_idinspeccion,
            'estacion_idestacion' => $this->estacion_idestacion,
            'nodo_idnodo' => $this->nodo_idnodo,
            'multimedia' => $this->multimedia,
        ]);

        return $dataProvider;
    }
}