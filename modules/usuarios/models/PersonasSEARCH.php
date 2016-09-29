<?php

namespace app\modules\usuarios\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\usuarios\models\Personas;

/**
 * PersonasSEARCH represents the model behind the search form about `app\modules\usuarios\models\Personas`.
 */
class PersonasSEARCH extends Personas {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_persona', 'fk_cargo', 'fk_documento', 'status'], 'integer'],
            [['n_documento', 'nombre', 'nombre_persona', 'apellido_persona',  's_nombre', 'apellido', 's_apellido', 'email_personal', 'email_corporativo', 'telefono', 'telefono_2', 'celular', 'fax', 'foto', 'fl_nacimiento', 'genero', 'observaciones','crop_info'], 'safe'],
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
        $query = Personas::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id_persona' => $this->id_persona,
            'fk_cargo' => $this->fk_cargo,
            'fk_documento' => $this->fk_documento,
            'fl_nacimiento' => $this->fl_nacimiento,
            'status' => $this->status,
              'crop_info' => $this->crop_info,
        ]);

        $query->andFilterWhere(['like', 'n_documento', $this->n_documento])
                ->andFilterWhere(['like', 'nombre', $this->nombre])
                ->andFilterWhere(['like', 's_nombre', $this->s_nombre])
                ->andFilterWhere(['like', 'apellido', $this->apellido])
                ->andFilterWhere(['like', 's_apellido', $this->s_apellido])
                ->andFilterWhere(['like', 'email_personal', $this->email_personal])
                ->andFilterWhere(['like', 'email_corporativo', $this->email_corporativo])
                ->andFilterWhere(['like', 'telefono', $this->telefono])
                ->andFilterWhere(['like', 'telefono_2', $this->telefono_2])
                ->andFilterWhere(['like', 'celular', $this->celular])
                ->andFilterWhere(['like', 'fax', $this->fax])
                ->andFilterWhere(['like', 'foto', $this->foto])
                ->andFilterWhere(['like', 'genero', $this->genero])
                ->andFilterWhere(['like', 'CONCAT(nombre, " ",s_nombre)', $this->nombre_persona])
                ->andFilterWhere(['like', 'CONCAT(apellido, " ",s_apellido)', $this->apellido_persona])
                ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;

    }

}
