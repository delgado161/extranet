<?php

namespace app\modules\usuarios\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\usuarios\models\Usuarios]].
 *
 * @see \app\modules\usuarios\models\Usuarios
 */
class UsuariosQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      return $this->andWhere('[[status]]=1');
      } */

    /**
     * @inheritdoc
     * @return \app\modules\usuarios\models\Usuarios[]|array
     */
    public function all($db = null) {
        return parent::all($db);

    }

    /**
     * @inheritdoc
     * @return \app\modules\usuarios\models\Usuarios|array|null
     */
    public function one($db = null) {
        return parent::one($db);

    }



}
