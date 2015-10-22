<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estacion;

/**
 * EstacionSearch represents the model behind the search form about `app\models\Estacion`.
 */
class EstacionSearch extends Estacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idestacion', 'localidad_idlocalidad', 'distancia'], 'integer'],
            [['codigo', 'nombre', 'tipo_central', 'telefono', 'direccion'], 'safe'],
            [['tiempo'], 'number'],
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
        $query = Estacion::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize'=> isset(Yii::$app->params['defaultPageSize']) ? Yii::$app->params['defaultPageSize'] : 10,],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idestacion' => $this->idestacion,
            'localidad_idlocalidad' => $this->localidad_idlocalidad,
            'distancia' => $this->distancia,
            'tiempo' => $this->tiempo,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'tipo_central', $this->tipo_central])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'direccion', $this->direccion]);

        return $dataProvider;
    }
}
