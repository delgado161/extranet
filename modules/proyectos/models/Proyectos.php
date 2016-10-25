<?php

namespace app\modules\proyectos\models;

use Yii;
use app\modules\usuarios\models\Personas; 
use app\modules\clientes\models\Clientes;

/**
 * This is the model class for table "proyectos".
 *
 * @property integer $id_proyectos
 * @property string $fk_cliente
 * @property integer $fk_tipo
 * @property integer $fk_lider
 * @property integer $fk_status
 * @property integer $fk_contacto
 * @property integer $fk_contact_alterno
 * @property string $nombre
 * @property string $descripcion
 * @property string $Keywords
 * @property string $fl_inicio
 * @property string $fl_fin
 * @property integer $status
 *
 * @property Actividades[] $actividades
 * @property Personas $fkContactAlterno
 * @property Clientes $fkCliente
 * @property Personas $fkContacto
 * @property Personas $fkLider
 * @property Tareas[] $tareas
 */
class Proyectos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyectos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proyectos', 'fk_cliente', 'fk_tipo', 'fk_lider', 'fk_status', 'fk_contacto', 'fk_contact_alterno', 'nombre', 'fl_inicio', 'fl_fin', 'status'], 'required'],
            [['id_proyectos', 'fk_tipo', 'fk_lider', 'fk_status', 'fk_contacto', 'fk_contact_alterno', 'status'], 'integer'],
            [['descripcion', 'Keywords'], 'string'],
            [['fl_inicio', 'fl_fin'], 'safe'],
            [['fk_cliente'], 'string', 'max' => 100],
            [['nombre'], 'string', 'max' => 250],
            [['id_proyectos'], 'unique'],
            [['fk_contact_alterno'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['fk_contact_alterno' => 'id_persona']],
            [['fk_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['fk_cliente' => 'id_cliente']],
            [['fk_contacto'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['fk_contacto' => 'id_persona']],
            [['fk_lider'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['fk_lider' => 'id_persona']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_proyectos' => Yii::t('app', 'Id Proyectos'),
            'fk_cliente' => Yii::t('app', 'Fk Cliente'),
            'fk_tipo' => Yii::t('app', 'Fk Tipo'),
            'fk_lider' => Yii::t('app', 'Fk Lider'),
            'fk_status' => Yii::t('app', 'Fk Status'),
            'fk_contacto' => Yii::t('app', 'Fk Contacto'),
            'fk_contact_alterno' => Yii::t('app', 'Fk Contact Alterno'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'Keywords' => Yii::t('app', 'Keywords'),
            'fl_inicio' => Yii::t('app', 'Fl Inicio'),
            'fl_fin' => Yii::t('app', 'Fl Fin'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividades()
    {
        return $this->hasMany(Actividades::className(), ['fk_proyecto' => 'id_proyectos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkContactAlterno()
    {
        return $this->hasOne(Personas::className(), ['id_persona' => 'fk_contact_alterno']);
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
    public function getFkContacto()
    {
        return $this->hasOne(Personas::className(), ['id_persona' => 'fk_contacto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkLider()
    {
        return $this->hasOne(Personas::className(), ['id_persona' => 'fk_lider']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTareas()
    {
        return $this->hasMany(Tareas::className(), ['fk_proyecto' => 'id_proyectos']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\proyectos\models\query\ProyectosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\proyectos\models\query\ProyectosQuery(get_called_class());
    }
}
