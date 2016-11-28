<?php

namespace app\modules\configuraciones\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\configuraciones\models\Parametros]].
 *
 * @see \app\modules\configuraciones\models\Parametros
 */
class ParametrosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\Parametros[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\Parametros|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
