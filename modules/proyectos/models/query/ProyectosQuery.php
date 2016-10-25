<?php

namespace app\modules\proyectos\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\proyectos\models\Proyectos]].
 *
 * @see \app\modules\proyectos\models\Proyectos
 */
class ProyectosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\proyectos\models\Proyectos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\proyectos\models\Proyectos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
