<?php

namespace app\modules\configuraciones\models;

use Yii;

/**
 * This is the model class for table "proyect_estatus".
 *
 * @property integer $id_estatus
 * @property string $nombre
 * @property integer $status
 */
class Proyectstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyect_estatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'status'], 'required'],
            [['status'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estatus' => Yii::t('app', 'Id Estatus'),
            'nombre' => Yii::t('app', 'Nombre'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\query\ProyectstatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\configuraciones\models\query\ProyectstatusQuery(get_called_class());
    }
}
