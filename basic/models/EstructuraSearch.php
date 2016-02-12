<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estructura;

/**
 * EstructuraSearch represents the model behind the search form about `app\models\Estructura`.
 */
class EstructuraSearch extends Estructura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idestructura', 'cantidad'], 'integer'],
            [['codigo', 'nombre', 'observacion', 'estacion_idestacion', 'tipo_estructura_idtipo_estructura', 'estructura_idestructura'], 'safe'],
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
        $query = Estructura::find()->where(['!=','idestructura','1']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('estacionIdestacion')->joinWith('tipoEstructuraIdtipoEstructura');

        $query->andFilterWhere([
            'idestructura' => $this->idestructura,
            
        ]);

        $query->andFilterWhere(['like', 'estructura.codigo', $this->codigo])
            ->andFilterWhere(['like', 'estructura.nombre', $this->nombre])
            ->andFilterWhere(['like', 'estructura.observacion', $this->observacion])
            ->andFilterWhere(['like', 'estacion.nombre', $this->estacion_idestacion])
            ->andFilterWhere(['like', 'tipo_estructura.nombre', $this->tipo_estructura_idtipo_estructura])
            ->andFilterWhere(['like', 'estructura.nombre',$this->estructura_idestructura])
            ->andFilterWhere(['like', 'estructura.cantidad', $this->cantidad]);

        return $dataProvider;
    }
}
