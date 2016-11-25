<?php

namespace app\modules\clientes\models;

use Yii;
use \app\modules\usuarios\models\Personas;

/**
 * This is the model class for table "cliente_contacto".
 *
 * @property integer $id_contacto
 * @property string $fk_cliente
 * @property integer $fk_persona
 *
 * @property Clientes $fkCliente
 * @property Personas $fkPersona
 */
class ClienteContacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente_contacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_cliente', 'fk_persona'], 'required'],
            [['fk_persona'], 'integer'],
            [['fk_cliente'], 'string', 'max' => 5],
            [['fk_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['fk_cliente' => 'id_cliente']],
            [['fk_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['fk_persona' => 'id_persona']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contacto' => Yii::t('app', 'Id Contacto'),
            'fk_cliente' => Yii::t('app', 'Fk Cliente'),
            'fk_persona' => Yii::t('app', 'Fk Persona'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkCliente()
    {
        return $this->hasOne(Clientes::className(), ['id_cliente' => 'fk_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkPersona()
    {
        return $this->hasOne(Personas::className(), ['id_persona' => 'fk_persona']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\clientes\models\query\ClienteContactoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\clientes\models\query\ClienteContactoQuery(get_called_class());
    }
}
