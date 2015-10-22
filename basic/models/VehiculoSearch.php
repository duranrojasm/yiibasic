<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vehiculo;

/**
 * VehiculoSearch represents the model behind the search form about `app\models\Vehiculo`.
 */
class VehiculoSearch extends Vehiculo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idvehiculo', 'ano'], 'integer'],
            [['control', 'placa', 'marca', 'modelo', 'unidad', 'estado', 'aviso', 'obser_aviso', 'fecha', 'estatus'], 'safe'],
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
        $query = Vehiculo::find();

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
            'idvehiculo' => $this->idvehiculo,
            'ano' => $this->ano,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'control', $this->control])
            ->andFilterWhere(['like', 'placa', $this->placa])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'unidad', $this->unidad])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'aviso', $this->aviso])
            ->andFilterWhere(['like', 'obser_aviso', $this->obser_aviso])
            ->andFilterWhere(['like', 'estatus', $this->estatus]);

        return $dataProvider;
    }
}
