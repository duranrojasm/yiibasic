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
            [['idreporte_falla'], 'integer'],
            [['descripcion', 'ptos_referencia', 'fecha_inicio', 'fecha_fin', 'estatus', 'urgencia','equipo_general_idequipo_general', 'enlace_satelital_idenlace_satelital', 'radio_idradio', 'fibra_optica_idfibra_optica', 'estacion_idestacion', 'nodo_idnodo', 'falla_idfalla'], 'safe'],
            [['distancia','atraso'], 'number'],
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
    public function search($params,$n)
    {
        if($n==1)
        {

           $query = ReporteFalla::find()->where(['>','fibra_optica_idfibra_optica', '1']);

        }elseif ($n==2)
        {
           $query = ReporteFalla::find()->where(['>','radio_idradio', '1']);
               
        }elseif ($n==3)
        {
             $query = ReporteFalla::find()->where(['>','enlace_satelital_idenlace_satelital', '1']);; 
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('enlaceSatelitalIdenlaceSatelital')
        ->joinWith('equipoGeneralIdequipoGeneral')
        ->joinWith('estacionIdestacion')
        ->joinWith('fallaIdfalla')
        ->joinWith('fibraOpticaIdfibraOptica')
        ->joinWith('nodoIdnodo')
        ->joinWith('radioIdradio');
        

        $query->andFilterWhere([
            'idreporte_falla' => $this->idreporte_falla,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
           
        ]);

        $query->andFilterWhere(['like', 'reporte_falla.descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'reporte_falla.ptos_referencia', $this->ptos_referencia])
            ->andFilterWhere(['like', 'reporte_falla.estatus', $this->estatus])
            ->andFilterWhere(['like', 'reporte_falla.urgencia', $this->urgencia])
            ->andFilterWhere(['=', 'reporte_falla.distancia', $this->distancia])
            ->andFilterWhere(['like', 'falla.nombre', $this->falla_idfalla])
            ->andFilterWhere(['like', 'enlace_satelital.codigo', $this->enlace_satelital_idenlace_satelital])
            ->andFilterWhere(['like', 'radio.serial', $this->radio_idradio])
            ->andFilterWhere(['like', 'fibra_optica.nombre', $this->fibra_optica_idfibra_optica])
            ->andFilterWhere(['like', 'estacion.nombre', $this->estacion_idestacion])
            ->andFilterWhere(['like', 'equipo_general.nombre', $this->equipo_general_idequipo_general])
            ->andFilterWhere(['like', 'nodo.nombre', $this->nodo_idnodo]);

        return $dataProvider;
    }
}
