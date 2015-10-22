<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ReporteFalla;

/**
 * ReporteFallaSearch represents the model behind the search form about `app\models\ReporteFalla`.
 */
class ReporteFallaSearch extends ReporteFalla
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idreporte_falla', 'falla_idfalla'], 'integer'],
            [['descripcion', 'ptos_referencia', 'fecha_inicio', 'fecha_fin', 'estatus', 'urgencia'], 'safe'],
            [['distancia'], 'number'],
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
        $query = ReporteFalla::find();

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
            'idreporte_falla' => $this->idreporte_falla,
            'falla_idfalla' => $this->falla_idfalla,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'distancia' => $this->distancia,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'ptos_referencia', $this->ptos_referencia])
            ->andFilterWhere(['like', 'estatus', $this->estatus])
            ->andFilterWhere(['like', 'urgencia', $this->urgencia]);

        return $dataProvider;
    }
}
