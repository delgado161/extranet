<?php

namespace app\modules\clientes\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\clientes\models\Clientes]].
 *
 * @see \app\modules\clientes\models\Clientes
 */
class ClientesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\clientes\models\Clientes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\clientes\models\Clientes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
