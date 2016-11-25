<?php

namespace app\modules\clientes\models;

use Yii;
use app\modules\usuarios\models\Personas;
use \app\modules\configuraciones\models\TipoDocumento;

/**
 * This is the model class for table "clientes".
 *
 * @property string $id_cliente
 * @property string $fk_cliente_ref
 * @property integer $fk_presona_ref
 * @property string $nombre
 * @property string $nombre_corto
 * @property string $telefono_1
 * @property string $telefono_2
 * @property string $fax
 * @property string $rif
 * @property string $fk_documento
 * @property integer $status
 * @property string $email
 * @property string $t_empresa
 *
 * @property Clientes $fkClienteRef
 * @property Clientes[] $clientes
 * @property Personas $fkPresonaRef
 * @property Proyectos[] $proyectos
 */
class Clientes extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'clientes';

    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_cliente', 'nombre', 'nombre_corto', 'telefono_1', 'rif', 'status', 'email', 't_empresa', 'fk_documento'], 'required'],
            [['fk_presona_ref', 'status'], 'integer'],
            [['id_cliente', 'fk_cliente_ref', 'nombre_corto'], 'string', 'max' => 100],
            [['nombre'], 'string', 'max' => 250],
            [['telefono_1', 'telefono_2', 'fax', 'rif', 'fk_documento'], 'string', 'max' => 45],
            [['id_cliente'], 'unique'],
            [['fk_cliente_ref'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['fk_cliente_ref' => 'id_cliente']],
            [['fk_presona_ref'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['fk_presona_ref' => 'id_persona']],
        ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_cliente' => Yii::t('app', 'Id Cliente'),
            'fk_cliente_ref' => Yii::t('app', 'Fk Cliente Ref'),
            'fk_presona_ref' => Yii::t('app', 'Fk Presona Ref'),
            'nombre' => Yii::t('app', 'Nombre'),
            'nombre_corto' => Yii::t('app', 'Nombre Corto'),
            'telefono_1' => Yii::t('app', 'Telefono 1'),
            'telefono_2' => Yii::t('app', 'Telefono 2'),
            'fax' => Yii::t('app', 'Fax'),
            'rif' => Yii::t('app', 'N°'),
            'fk_documento' => Yii::t('app', 'Tipo'),
            'status' => Yii::t('app', 'Estatus'),
            'email' => Yii::t('app', 'Email'),
            't_empresa' => Yii::t('app', 'Tipo de Cliente'),
        ];

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkClienteRef() {
        return $this->hasOne(Clientes::className(), ['id_cliente' => 'fk_cliente_ref']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes() {
        return $this->hasMany(Clientes::className(), ['fk_cliente_ref' => 'id_cliente']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkPresonaRef() {
        return $this->hasOne(Personas::className(), ['id_persona' => 'fk_presona_ref']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkDocumento() {
        return $this->hasOne(TipoDocumento::className(), ['id_tipo_documento' => 'fk_documento']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectos() {
        return $this->hasMany(Proyectos::className(), ['fk_cliente' => 'id_cliente']);

    }

    /**
     * @inheritdoc
     * @return \app\modules\usuarios\models\query\ClientesQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\modules\clientes\models\query\ClientesQuery(get_called_class());

    }

}
