<?php

namespace app\modules\usuarios\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\usuarios\models\Usuarios;

/**
 * UsuariosSEARCH represents the model behind the search form about `app\modules\usuarios\models\Usuarios`.
 */
class UsuariosSEARCH extends Usuarios {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_usuario', 'fl_perfil', 'fl_persona', 'status'], 'integer'],
            [['username', 'apellido_persona', 'clave', 'ultimo_login', 'nombre_perfil', 'nombre_persona'], 'safe'],
        ];

    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Usuarios::find()->from(Usuarios::tableName() . ' t');
        $query->joinWith(['flPerfil', 'flPersona']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $dataProvider->sort->attributes['nombre_perfil'] = [
            'asc' => ['perfiles.nombre' => SORT_ASC],
            'desc' => ['perfiles.nombre' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['nombre_persona'] = [
            'asc' => ['personas.nombre' => SORT_ASC,'personas.s_nombre' => SORT_ASC],
            'desc' => ['personas.nombre' => SORT_DESC,'personas.s_nombre' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['apellido_persona'] = [
            'asc' => ['personas.apellido' => SORT_ASC,'personas.s_apellido' => SORT_ASC],
            'desc' => ['personas.apellido' => SORT_DESC,'personas.s_apellido' => SORT_DESC],
        ];



        // grid filtering conditions
        $query->andFilterWhere([
            'id_usuario' => $this->id_usuario,
            'fl_perfil' => $this->nombre_perfil,
            'fl_persona' => $this->fl_persona,
            'ultimo_login' => $this->ultimo_login,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
//                ->andFilterWhere(['like', 'flPerfil.nombre', $this->nombre_perfil])
                ->andFilterWhere(['like', 'CONCAT(personas.nombre, " ",personas.s_nombre)', $this->nombre_persona])
                ->andFilterWhere(['like', 'CONCAT(personas.apellido, " ",personas.s_apellido)', $this->apellido_persona]);
//                ->andFilterWhere(['or',
//                    ['like', 'flPerfil.nombre', $this->nombre_persona],
//                    ['like', 'flPerfil.s_nombre', $this->nombre_persona]
//        ]);

        return $dataProvider;

    }

}
