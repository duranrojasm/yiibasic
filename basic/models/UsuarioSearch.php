<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form about `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idusuario', 'estacion_idestacion', 'rol_idrol'], 'integer'],
            [['nombre', 'apellido', 'cedula', 'num_sap', 'carnet', 'telefono_cel', 'telefono_hab', 'cargo', 'correo', 'gerencia_general', 'gerencia', 'departamento'], 'safe'],
            [['disponibilidad'], 'boolean'],
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
        $query = Usuario::find();

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
            'idusuario' => $this->idusuario,
            'estacion_idestacion' => $this->estacion_idestacion,
            'rol_idrol' => $this->rol_idrol,
            'disponibilidad' => $this->disponibilidad,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'cedula', $this->cedula])
            ->andFilterWhere(['like', 'num_sap', $this->num_sap])
            ->andFilterWhere(['like', 'carnet', $this->carnet])
            ->andFilterWhere(['like', 'telefono_cel', $this->telefono_cel])
            ->andFilterWhere(['like', 'telefono_hab', $this->telefono_hab])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'gerencia_general', $this->gerencia_general])
            ->andFilterWhere(['like', 'gerencia', $this->gerencia])
            ->andFilterWhere(['like', 'departamento', $this->departamento]);

        return $dataProvider;
    }
}
