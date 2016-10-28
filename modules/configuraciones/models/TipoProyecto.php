<?php

namespace app\modules\configuraciones\models;

use Yii;

/**
 * This is the model class for table "tipo_proyecto".
 *
 * @property integer $id_tipo_proyecto
 * @property string $nombre
 * @property string $descripcion
 * @property integer $status
 *
 * @property Proyectos[] $proyectos
 */
class TipoProyecto extends \yii\db\ActiveRecord
{
    
    public $cnt;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion'], 'required'],
            [['status'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_proyecto' => Yii::t('app', 'Id Tipo Proyecto'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectos()
    {
        return $this->hasMany(Proyectos::className(), ['fk_tipo' => 'id_tipo_proyecto']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\query\TipoProyectoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\configuraciones\models\query\TipoProyectoQuery(get_called_class());
    }
}
