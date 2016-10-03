<?php

namespace app\modules\usuarios\models;

use Yii;

/**
 * This is the model class for table "cargos".
 *
 * @property integer $id_cargo
 * @property string $cargo
 * @property integer $status
 *
 * @property Personas[] $personas
 */
class Cargos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cargos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cargo', 'status'], 'required'],
            [['status'], 'integer'],
            [['cargo'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cargo' => Yii::t('app', 'Id Cargo'),
            'cargo' => Yii::t('app', 'Cargo'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Personas::className(), ['fk_cargo' => 'id_cargo']);
    }

    /**
     * @inheritdoc
     * @return CargosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CargosQuery(get_called_class());
    }
}
