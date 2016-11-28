<?php

namespace app\modules\configuraciones\models;

use Yii;

/**
 * This is the model class for table "parametros".
 *
 * @property integer $id_parametro
 * @property string $parametro
 * @property string $valor
 */
class Parametros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parametros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parametro', 'valor'], 'required'],
            [['valor'], 'string'],
            [['parametro'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_parametro' => Yii::t('app', 'Id Parametro'),
            'parametro' => Yii::t('app', 'Parametro'),
            'valor' => Yii::t('app', 'Valor'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\query\ParametrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\configuraciones\models\query\ParametrosQuery(get_called_class());
    }
}
