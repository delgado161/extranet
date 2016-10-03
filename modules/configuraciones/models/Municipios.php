<?php

namespace app\modules\configuraciones\models;

use Yii;

/**
 * This is the model class for table "tbl_direc_parro_municipios".
 *
 * @property string $lp_municipio_id
 * @property string $nombre
 * @property string $lf_municipio_estado
 * @property integer $visibilidad
 *
 * @property TblDirecParroMunicEstados $lfMunicipioEstado
 * @property TblDireccionParroquias[] $tblDireccionParroquias
 */
class Municipios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_direc_parro_municipios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lp_municipio_id', 'nombre', 'lf_municipio_estado', 'visibilidad'], 'required'],
            [['visibilidad'], 'integer'],
            [['lp_municipio_id', 'lf_municipio_estado'], 'string', 'max' => 5],
            [['nombre'], 'string', 'max' => 25],
            [['lp_municipio_id'], 'unique'],
            [['lf_municipio_estado'], 'exist', 'skipOnError' => true, 'targetClass' => TblDirecParroMunicEstados::className(), 'targetAttribute' => ['lf_municipio_estado' => 'lp_estado_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lp_municipio_id' => Yii::t('app', 'Lp Municipio ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'lf_municipio_estado' => Yii::t('app', 'Lf Municipio Estado'),
            'visibilidad' => Yii::t('app', 'Visibilidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLfMunicipioEstado()
    {
        return $this->hasOne(TblDirecParroMunicEstados::className(), ['lp_estado_id' => 'lf_municipio_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDireccionParroquias()
    {
        return $this->hasMany(TblDireccionParroquias::className(), ['lf_parroquia_municipio' => 'lp_municipio_id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\query\MunicipiosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\configuraciones\models\query\MunicipiosQuery(get_called_class());
    }
}
