<?php

namespace app\modules\proyectos\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\proyectos\models\Proyectos;

/**
 * ProyectosSEARCH represents the model behind the search form about `app\modules\proyectos\models\Proyectos`.
 */
class ProyectosSEARCH extends Proyectos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proyectos', 'fk_tipo', 'fk_lider', 'fk_status', 'fk_contacto', 'fk_contact_alterno', 'status'], 'integer'],
            [['fk_cliente', 'nombre', 'descripcion', 'Keywords', 'fl_inicio', 'fl_fin'], 'safe'],
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
        $query = Proyectos::find();

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
            'id_proyectos' => $this->id_proyectos,
            'fk_tipo' => $this->fk_tipo,
            'fk_lider' => $this->fk_lider,
            'fk_status' => $this->fk_status,
            'fk_contacto' => $this->fk_contacto,
            'fk_contact_alterno' => $this->fk_contact_alterno,
            'fl_inicio' => $this->fl_inicio,
            'fl_fin' => $this->fl_fin,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'fk_cliente', $this->fk_cliente])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'Keywords', $this->Keywords]);

        return $dataProvider;
    }
}
