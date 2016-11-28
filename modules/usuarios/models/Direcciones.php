<?php

namespace app\modules\usuarios\models;

use Yii;
use app\modules\usuarios\models\Ptoreferencias;

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
            [[ 'urbarn_barrio', 'calle_av','tipovivienda', 'datovivienda', 'piso_numero', 'lf_direccion_ptoreferencia', 'referencia', 'codpostal', 'claveforeana', 'tabla_referen', 'lf_direccion_parroquia', 'visibilidad'], 'required'],
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
            't_urban_barr' => Yii::t('app', 'Tipo'),
            'urbarn_barrio' => Yii::t('app', 'Dirección'),
            't_calle_av' => Yii::t('app', 'Tipo'),
            'calle_av' => Yii::t('app', 'Dirección'),
            'tipovivienda' => Yii::t('app', 'Tipo'),
            'datovivienda' => Yii::t('app', 'Vivienda'),
            'piso_numero' => Yii::t('app', 'Nº Piso'),
            'oficin_apart' => Yii::t('app', 'Oficina/Apartamento'),
            'lf_direccion_ptoreferencia' => Yii::t('app', 'Pto. de Referencia'),
            'referencia' => Yii::t('app', 'Referencia'),
            'codpostal' => Yii::t('app', 'Código Postal'),
            'claveforeana' => Yii::t('app', 'Claveforeana'),
            'tabla_referen' => Yii::t('app', 'Tabla Referen'),
            'lf_direccion_parroquia' => Yii::t('app', 'Parroquia'),
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
        return $this->hasOne(Ptoreferencias::className(), ['lp_ptoreferencia_id' => 'lf_direccion_ptoreferencia']);
    }
}
