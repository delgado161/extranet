<?php

namespace app\modules\configuraciones\models;

use Yii;

/**
 * This is the model class for table "tbl_direc_parro_munic_estados".
 *
 * @property string $lp_estado_id
 * @property string $nombre
 * @property string $lf_estado_pais
 * @property integer $visibilidad
 *
 * @property TblDirecParroMunicEstadPaises $lfEstadoPais
 * @property TblDirecParroMunicipios[] $tblDirecParroMunicipios
 */
class Estados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_direc_parro_munic_estados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lp_estado_id', 'nombre', 'lf_estado_pais', 'visibilidad'], 'required'],
            [['visibilidad'], 'integer'],
            [['lp_estado_id', 'lf_estado_pais'], 'string', 'max' => 5],
            [['nombre'], 'string', 'max' => 25],
            [['lp_estado_id'], 'unique'],
            [['lf_estado_pais'], 'exist', 'skipOnError' => true, 'targetClass' => TblDirecParroMunicEstadPaises::className(), 'targetAttribute' => ['lf_estado_pais' => 'lp_pais_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lp_estado_id' => Yii::t('app', 'Lp Estado ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'lf_estado_pais' => Yii::t('app', 'Lf Estado Pais'),
            'visibilidad' => Yii::t('app', 'Visibilidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLfEstadoPais()
    {
        return $this->hasOne(TblDirecParroMunicEstadPaises::className(), ['lp_pais_id' => 'lf_estado_pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDirecParroMunicipios()
    {
        return $this->hasMany(TblDirecParroMunicipios::className(), ['lf_municipio_estado' => 'lp_estado_id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\query\EstadosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\configuraciones\models\query\EstadosQuery(get_called_class());
    }
}
