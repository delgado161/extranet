<?php

namespace app\modules\configuraciones\models;

use Yii;

/**
 * This is the model class for table "tbl_direccion_parroquias".
 *
 * @property string $lp_parroquia_id
 * @property string $nombre
 * @property string $lf_parroquia_municipio
 * @property integer $visibilidad
 *
 * @property TblDirecParroMunicipios $lfParroquiaMunicipio
 * @property TblDirecciones[] $tblDirecciones
 */
class Parroquias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_direccion_parroquias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lp_parroquia_id', 'nombre', 'lf_parroquia_municipio', 'visibilidad'], 'required'],
            [['visibilidad'], 'integer'],
            [['lp_parroquia_id', 'lf_parroquia_municipio'], 'string', 'max' => 5],
            [['nombre'], 'string', 'max' => 25],
            [['lp_parroquia_id'], 'unique'],
            [['lf_parroquia_municipio'], 'exist', 'skipOnError' => true, 'targetClass' => TblDirecParroMunicipios::className(), 'targetAttribute' => ['lf_parroquia_municipio' => 'lp_municipio_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lp_parroquia_id' => Yii::t('app', 'Lp Parroquia ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'lf_parroquia_municipio' => Yii::t('app', 'Lf Parroquia Municipio'),
            'visibilidad' => Yii::t('app', 'Visibilidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLfParroquiaMunicipio()
    {
        return $this->hasOne(TblDirecParroMunicipios::className(), ['lp_municipio_id' => 'lf_parroquia_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDirecciones()
    {
        return $this->hasMany(TblDirecciones::className(), ['lf_direccion_parroquia' => 'lp_parroquia_id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\query\ParroquiasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\configuraciones\models\query\ParroquiasQuery(get_called_class());
    }
}
