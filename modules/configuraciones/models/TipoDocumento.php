<?php

namespace app\modules\configuraciones\models;

use Yii;

/**
 * This is the model class for table "tipo_documento".
 *
 * @property integer $id_tipo_documento
 * @property string $nombre
 * @property string $descripcion
 */
class TipoDocumento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_documento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion'], 'required'],
            [['nombre'], 'string', 'max' => 1],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_documento' => Yii::t('app', 'Id Tipo Documento'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\query\TipoDocumentoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\configuraciones\models\query\TipoDocumentoQuery(get_called_class());
    }
}
