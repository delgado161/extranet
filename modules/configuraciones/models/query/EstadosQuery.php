<?php

namespace app\modules\configuraciones\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\configuraciones\models\Estados]].
 *
 * @see \app\modules\configuraciones\models\Estados
 */
class EstadosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\Estados[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\Estados|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
