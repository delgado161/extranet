<?php

namespace app\modules\usuarios\models;

use Yii;

/**
 * This is the model class for table "direcciones".
 *
 * @property integer $id_direcciones
 * @property string $tabla_apunta
 * @property double $lat
 * @property double $lng
 */
class Direcciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'direcciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tabla_apunta', 'lat', 'lng'], 'required'],
            [['lat', 'lng'], 'number'],
            [['tabla_apunta'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_direcciones' => Yii::t('app', 'Id Direcciones'),
            'tabla_apunta' => Yii::t('app', 'Tabla Apunta'),
            'lat' => Yii::t('app', 'Lat'),
            'lng' => Yii::t('app', 'Lng'),
        ];
    }
}
