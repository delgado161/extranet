<?php

namespace app\modules\clientes\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\clientes\models\Clientes;

/**
 * ClientesSEARCH represents the model behind the search form about `app\modules\usuarios\models\Clientes`.
 */
class ClientesSEARCH extends Clientes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente', 'fk_cliente_ref', 'nombre', 'nombre_corto', 'telefono_1', 'telefono_2', 'fax', 'rif','status'], 'safe'],
            [['fk_presona_ref', 'status'], 'integer'],
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
        $query = Clientes::find();

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
            'fk_presona_ref' => $this->fk_presona_ref,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'id_cliente', $this->id_cliente])
            ->andFilterWhere(['like', 'fk_cliente_ref', $this->fk_cliente_ref])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'nombre_corto', $this->nombre_corto])
            ->andFilterWhere(['like', 'telefono_1', $this->telefono_1])
            ->andFilterWhere(['like', 'telefono_2', $this->telefono_2])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'rif', $this->rif]);
//            ->andFilterWhere(['like', 'nit', $this->nit]);

        return $dataProvider;
    }
}
