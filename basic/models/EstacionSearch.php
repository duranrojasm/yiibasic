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
            [['idestacion', 'distancia'], 'integer'],
            [['codigo', 'nombre', 'tipo_central', 'telefono', 'direccion', 'localidad_idlocalidad'], 'safe'],
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
        $query = Estacion::find()->where(['!=','idestacion','1']);

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

         $query->joinWith('localidadIdlocalidad');

        $query->andFilterWhere([
            'idestacion' => $this->idestacion,
           
          
          
        ]);

        $query->andFilterWhere(['like', 'estacion.codigo', $this->codigo])
            ->andFilterWhere(['like', 'estacion.nombre', $this->nombre])
            ->andFilterWhere(['like', 'estacion.tipo_central', $this->tipo_central])
             ->andFilterWhere(['=', 'estacion.distancia', $this->distancia])
            ->andFilterWhere(['=', 'estacion.tiempo',  $this->tiempo])
            ->andFilterWhere(['like', 'estacion.telefono', $this->telefono])
            ->andFilterWhere(['like', 'estacion.direccion', $this->direccion])
            ->andFilterWhere(['like', 'localidad.nombre', $this->localidad_idlocalidad]);

        return $dataProvider;
    }
}
