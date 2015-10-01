<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RecursoFalla;

/**
 * RecursoFallaSearch represents the model behind the search form about `app\models\RecursoFalla`.
 */
class RecursoFallaSearch extends RecursoFalla
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idrecurso_falla', 'reporte_falla_idreporte_falla', 'cantidad'], 'integer'],
            [['nombre'], 'safe'],
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
        $query = RecursoFalla::find();

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
            'idrecurso_falla' => $this->idrecurso_falla,
            'reporte_falla_idreporte_falla' => $this->reporte_falla_idreporte_falla,
            'cantidad' => $this->cantidad,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
