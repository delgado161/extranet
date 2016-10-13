<?php

namespace app\modules\usuarios\models;

use Yii;

/**
 * This is the model class for table "tbl_direcciones".
 *
 * @property string $lp_direccion_id
 * @property string $t_urban_barr
 * @property string $urbarn_barrio
 * @property string $t_calle_av
 * @property string $calle_av
 * @property string $tipovivienda
 * @property string $datovivienda
 * @property string $piso_numero
 * @property string $oficin_apart
 * @property string $lf_direccion_ptoreferencia
 * @property string $referencia
 * @property integer $codpostal
 * @property string $claveforeana
 * @property string $tabla_referen
 * @property string $lf_direccion_parroquia
 * @property integer $visibilidad
 * @property integer $lat
 * @property integer $lng
 *
 * @property TblDireccionParroquias $lfDireccionParroquia
 * @property TblDirecPtoreferencias $lfDireccionPtoreferencia
 */
class Direcciones extends \yii\db\ActiveRecord
{
    
    public $pais;
    public $estado;
    public $municipio;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_direcciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'tipovivienda', 'datovivienda', 'piso_numero', 'lf_direccion_ptoreferencia', 'referencia', 'codpostal', 'claveforeana', 'tabla_referen', 'lf_direccion_parroquia', 'visibilidad'], 'required'],
            [['lp_direccion_id','codpostal', 'visibilidad'], 'integer'],
            [[ 'lf_direccion_ptoreferencia', 'claveforeana', 'lf_direccion_parroquia'], 'string', 'max' => 5],
            [['t_urban_barr', 't_calle_av'], 'string', 'max' => 13],
            [['urbarn_barrio', 'calle_av', 'datovivienda', 'referencia', 'tabla_referen'], 'string', 'max' => 45],
            [['tipovivienda'], 'string', 'max' => 10],
            [['piso_numero'], 'string', 'max' => 15],
            [['oficin_apart'], 'string', 'max' => 20],
            [['lp_direccion_id'], 'unique'],
            [['lat', 'lng'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lp_direccion_id' => Yii::t('app', 'Lp Direccion ID'),
            't_urban_barr' => Yii::t('app', 'T Urban Barr'),
            'urbarn_barrio' => Yii::t('app', 'Urbarn Barrio'),
            't_calle_av' => Yii::t('app', 'T Calle Av'),
            'calle_av' => Yii::t('app', 'Calle Av'),
            'tipovivienda' => Yii::t('app', 'Tipovivienda'),
            'datovivienda' => Yii::t('app', 'Datovivienda'),
            'piso_numero' => Yii::t('app', 'Piso Numero'),
            'oficin_apart' => Yii::t('app', 'Oficin Apart'),
            'lf_direccion_ptoreferencia' => Yii::t('app', 'Lf Direccion Ptoreferencia'),
            'referencia' => Yii::t('app', 'Referencia'),
            'codpostal' => Yii::t('app', 'Codpostal'),
            'claveforeana' => Yii::t('app', 'Claveforeana'),
            'tabla_referen' => Yii::t('app', 'Tabla Referen'),
            'lf_direccion_parroquia' => Yii::t('app', 'Lf Direccion Parroquia'),
            'visibilidad' => Yii::t('app', 'Visibilidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLfDireccionParroquia()
    {
        return $this->hasOne(TblDireccionParroquias::className(), ['lp_parroquia_id' => 'lf_direccion_parroquia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLfDireccionPtoreferencia()
    {
        return $this->hasOne(TblDirecPtoreferencias::className(), ['lp_ptoreferencia_id' => 'lf_direccion_ptoreferencia']);
    }
}
