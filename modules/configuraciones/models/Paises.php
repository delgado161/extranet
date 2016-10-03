<?php

namespace app\modules\configuraciones\models;

use Yii;

/**
 * This is the model class for table "tbl_direc_parro_munic_estad_paises".
 *
 * @property string $lp_pais_id
 * @property string $nombre
 * @property integer $visibilidad
 *
 * @property TblDirecParroMunicEstados[] $tblDirecParroMunicEstados
 */
class Paises extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_direc_parro_munic_estad_paises';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lp_pais_id', 'nombre', 'visibilidad'], 'required'],
            [['visibilidad'], 'integer'],
            [['lp_pais_id'], 'string', 'max' => 5],
            [['nombre'], 'string', 'max' => 25],
            [['lp_pais_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lp_pais_id' => Yii::t('app', 'Lp Pais ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'visibilidad' => Yii::t('app', 'Visibilidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDirecParroMunicEstados()
    {
        return $this->hasMany(TblDirecParroMunicEstados::className(), ['lf_estado_pais' => 'lp_pais_id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\configuraciones\models\query\PaisesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\configuraciones\models\query\PaisesQuery(get_called_class());
    }
}
