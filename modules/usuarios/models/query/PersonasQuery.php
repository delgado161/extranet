<?php

namespace app\modules\usuarios\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\usuarios\models\Personas]].
 *
 * @see \app\modules\usuarios\models\Personas
 */
class PersonasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\usuarios\models\Personas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\usuarios\models\Personas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
