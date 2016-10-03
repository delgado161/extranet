<?php

namespace app\modules\configuraciones\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\configuraciones\models\TipoDocumento]].
 *
 * @see \app\modules\configuraciones\models\TipoDocumento
 */
class TipoDocumentoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\TipoDocumento[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\TipoDocumento|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
