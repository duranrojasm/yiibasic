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
            [['idestructura', 'estacion_idestacion', 'tipo_estructura_idtipo_estructura', 'estructura_idestructura', 'cantidad'], 'integer'],
            [['codigo', 'nombre', 'observacion'], 'safe'],
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
        $query = Estructura::find();

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
            'idestructura' => $this->idestructura,
            'estacion_idestacion' => $this->estacion_idestacion,
            'tipo_estructura_idtipo_estructura' => $this->tipo_estructura_idtipo_estructura,
            'estructura_idestructura' => $this->estructura_idestructura,
            'cantidad' => $this->cantidad,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
