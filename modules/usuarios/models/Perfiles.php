<?php

namespace app\modules\usuarios\models;

use Yii;

/**
 * This is the model class for table "perfiles".
 *
 * @property integer $id_perfile
 * @property string $nombre
 * @property integer $status
 *
 * @property Usuarios[] $usuarios
 */
class Perfiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfiles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'status'], 'required'],
            [['status'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_perfile' => Yii::t('app', 'Id Perfile'),
            'nombre' => Yii::t('app', 'Nombre'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['fl_perfil' => 'id_perfile']);
    }
}
