<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VehiculoReportef;

/**
 * VehiculoReportefSearch represents the model behind the search form about `app\models\VehiculoReportef`.
 */
class VehiculoReportefSearch extends VehiculoReportef
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehiculo_idvehiculo', 'reporte_falla_idreporte_falla'], 'integer'],
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
        $query = VehiculoReportef::find();

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
            'vehiculo_idvehiculo' => $this->vehiculo_idvehiculo,
            'reporte_falla_idreporte_falla' => $this->reporte_falla_idreporte_falla,
        ]);

        return $dataProvider;
    }
}
