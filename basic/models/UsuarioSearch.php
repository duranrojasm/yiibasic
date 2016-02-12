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
            [['idusuario', 'rol_idrol'], 'integer'],
            [['nombre', 'apellido', 'cedula', 'num_sap', 'carnet', 'estacion_idestacion', 'telefono_cel', 'telefono_hab', 'cargo', 'correo', 'gerencia_general', 'gerencia', 'departamento'], 'safe'],
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

        $query->joinWith('estacionIdestacion');

        $query->andFilterWhere([
            'idusuario' => $this->idusuario,
         
            'rol_idrol' => $this->rol_idrol,
            'disponibilidad' => $this->disponibilidad,
        ]);

        $query->andFilterWhere(['like', 'usuario.nombre', $this->nombre])
            ->andFilterWhere(['like', 'usuario.apellido', $this->apellido])
            ->andFilterWhere(['like', 'usuario.cedula', $this->cedula])
            ->andFilterWhere(['like', 'usuario.num_sap', $this->num_sap])
            ->andFilterWhere(['like', 'usuario.carnet', $this->carnet])
            ->andFilterWhere(['like', 'usuario.telefono_cel', $this->telefono_cel])
            ->andFilterWhere(['like', 'usuario.telefono_hab', $this->telefono_hab])
            ->andFilterWhere(['like', 'usuario.cargo', $this->cargo])
            ->andFilterWhere(['like', 'usuario.correo', $this->correo])
            ->andFilterWhere(['like', 'usuario.gerencia_general', $this->gerencia_general])
            ->andFilterWhere(['like', 'usuario.gerencia', $this->gerencia])
            ->andFilterWhere(['like', 'usuario.departamento', $this->departamento])
             ->andFilterWhere(['like', 'estacion.nombre', $this->estacion_idestacion]);

        return $dataProvider;
    }
}
