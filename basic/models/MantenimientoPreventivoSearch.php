<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MantenimientoPreventivo;

/**
 * MantenimientoPreventivoSearch represents the model behind the search form about `app\models\MantenimientoPreventivo`.
 */
class MantenimientoPreventivoSearch extends MantenimientoPreventivo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idmantenimiento_preventivo', 'fibra_optica_idfibra_optica', 'equipo_general_idequipo_general', 'enlace_satelital_idenlace_satelital', 'radio_idradio', 'reporte_preven_idreporte_preven'], 'integer'],
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
        $query = MantenimientoPreventivo::find();

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
            'idmantenimiento_preventivo' => $this->idmantenimiento_preventivo,
            'fibra_optica_idfibra_optica' => $this->fibra_optica_idfibra_optica,
            'equipo_general_idequipo_general' => $this->equipo_general_idequipo_general,
            'enlace_satelital_idenlace_satelital' => $this->enlace_satelital_idenlace_satelital,
            'radio_idradio' => $this->radio_idradio,
            'reporte_preven_idreporte_preven' => $this->reporte_preven_idreporte_preven,
        ]);

        return $dataProvider;
    }
}
