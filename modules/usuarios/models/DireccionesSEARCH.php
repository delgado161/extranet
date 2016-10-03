<?php

namespace app\modules\usuarios\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\usuarios\models\Direcciones;

/**
 * DireccionesSEARCH represents the model behind the search form about `app\modules\usuarios\models\Direcciones`.
 */
class DireccionesSEARCH extends Direcciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lp_direccion_id', 'codpostal', 'visibilidad'], 'integer'],
            [['t_urban_barr', 'urbarn_barrio', 't_calle_av', 'calle_av', 'tipovivienda', 'datovivienda', 'piso_numero', 'oficin_apart', 'lf_direccion_ptoreferencia', 'referencia', 'claveforeana', 'tabla_referen', 'lf_direccion_parroquia'], 'safe'],
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
        $query = Direcciones::find();

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
            'lp_direccion_id' => $this->lp_direccion_id,
            'codpostal' => $this->codpostal,
            'visibilidad' => $this->visibilidad,
        ]);

        $query->andFilterWhere(['like', 't_urban_barr', $this->t_urban_barr])
            ->andFilterWhere(['like', 'urbarn_barrio', $this->urbarn_barrio])
            ->andFilterWhere(['like', 't_calle_av', $this->t_calle_av])
            ->andFilterWhere(['like', 'calle_av', $this->calle_av])
            ->andFilterWhere(['like', 'tipovivienda', $this->tipovivienda])
            ->andFilterWhere(['like', 'datovivienda', $this->datovivienda])
            ->andFilterWhere(['like', 'piso_numero', $this->piso_numero])
            ->andFilterWhere(['like', 'oficin_apart', $this->oficin_apart])
            ->andFilterWhere(['like', 'lf_direccion_ptoreferencia', $this->lf_direccion_ptoreferencia])
            ->andFilterWhere(['like', 'referencia', $this->referencia])
            ->andFilterWhere(['like', 'claveforeana', $this->claveforeana])
            ->andFilterWhere(['like', 'tabla_referen', $this->tabla_referen])
            ->andFilterWhere(['like', 'lf_direccion_parroquia', $this->lf_direccion_parroquia]);

        return $dataProvider;
    }
}
