<?php

namespace app\modules\usuarios\models;

use Yii;

/**
 * This is the model class for table "tbl_direc_ptoreferencias".
 *
 * @property string $lp_ptoreferencia_id
 * @property string $nombre
 * @property integer $visibilidad
 *
 * @property TblDirecciones[] $tblDirecciones
 */
class Ptoreferencias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_direc_ptoreferencias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lp_ptoreferencia_id', 'nombre', 'visibilidad'], 'required'],
            [['visibilidad'], 'integer'],
            [['lp_ptoreferencia_id'], 'string', 'max' => 5],
            [['nombre'], 'string', 'max' => 50],
            [['lp_ptoreferencia_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lp_ptoreferencia_id' => Yii::t('app', 'Lp Ptoreferencia ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'visibilidad' => Yii::t('app', 'Visibilidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDirecciones()
    {
        return $this->hasMany(TblDirecciones::className(), ['lf_direccion_ptoreferencia' => 'lp_ptoreferencia_id']);
    }
}
