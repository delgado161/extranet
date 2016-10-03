<?php

namespace app\modules\usuarios\models;

use Yii;
use \app\modules\configuraciones\models\TipoDocumento;
//use yii\helpers\BaseFileHelper;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;
use yii\web\UploadedFile;

/**
 * This is the model class for table "personas".
 *
 * @property integer $id_persona
 * @property integer $fk_cargo
 * @property integer $fk_documento
 * @property string $n_documento
 * @property string $nombre
 * @property string $s_nombre
 * @property string $apellido
 * @property string $s_apellido
 * @property string $email_personal
 * @property string $email_corporativo
 * @property string $telefono
 * @property string $telefono_2
 * @property string $celular
 * @property string $fax
 * @property string $foto
 * @property string $crop_info
 * @property string $fl_nacimiento
 * @property string $genero
 * @property string $observaciones
 * @property integer $status
 * 
 *
 * @property Clientes[] $clientes
 * @property Cargos $fkCargo
 * @property Proyectos[] $proyectos
 * @property Proyectos[] $proyectos0
 * @property Proyectos[] $proyectos1
 * @property Usuarios[] $usuarios
 */
class Personas extends \yii\db\ActiveRecord {

    public $crop_info;
    public $nombre_persona;
    public $apellido_persona;

    public function setCrop_info($count) {
        $this->crop_info = $count;

    }

    public function getCrop_info() {
        return $this->crop_info;

    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'personas';

    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['fk_cargo', 'fk_documento', 'n_documento', 'nombre', 'apellido', 'email_personal', 'email_corporativo', 'telefono', 'celular', 'fl_nacimiento', 'genero',], 'required'],
            [['fk_cargo', 'fk_documento', 'status', 'n_documento'], 'integer'],
            [['fl_nacimiento', 'crop_info'], 'safe'],
            [['observaciones', 'crop_info'], 'string'],
//            [['n_documento'], 'string', 'max' => 50],
            [['nombre', 's_nombre', 'apellido', 's_apellido', 'email_corporativo'], 'string', 'max' => 45],
            [['email_personal'], 'string', 'max' => 250],
            [['telefono', 'telefono_2', 'celular', 'fax'], 'string', 'max' => 20],
//            [['foto'], 'string', 'max' => 100],
            [['genero'], 'string', 'max' => 1],
            [['fk_cargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargos::className(), 'targetAttribute' => ['fk_cargo' => 'id_cargo']],
            [['fk_documento'], 'exist', 'skipOnError' => true, 'targetClass' => TipoDocumento::className(), 'targetAttribute' => ['fk_documento' => 'id_tipo_documento']],
            [['email_personal', 'email_corporativo'], 'email'],
//            ['foto', 'file', 'extensions' => ['jpg', 'jpeg', 'png', 'gif'], 'mimeTypes' => ['image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'],],
//            [['foto'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_persona' => Yii::t('app', 'Id Persona'),
            'fk_cargo' => Yii::t('app', 'Fk Cargo'),
            'fk_documento' => Yii::t('app', 'Documento'),
            'n_documento' => Yii::t('app', 'N Documento'),
            'nombre' => Yii::t('app', 'Nombre'),
            's_nombre' => Yii::t('app', 'S Nombre'),
            'apellido' => Yii::t('app', 'Apellido'),
            's_apellido' => Yii::t('app', 'S Apellido'),
            'email_personal' => Yii::t('app', 'Email Personal'),
            'email_corporativo' => Yii::t('app', 'Email Corporativo'),
            'telefono' => Yii::t('app', 'Telefono'),
            'telefono_2' => Yii::t('app', 'Telefono 2'),
            'celular' => Yii::t('app', 'Celular'),
            'fax' => Yii::t('app', 'Fax'),
            'foto' => Yii::t('app', 'Foto'),
            'crop_info' => Yii::t('app', 'crop_info'),
            'fl_nacimiento' => Yii::t('app', 'Fl Nacimiento'),
            'genero' => Yii::t('app', 'Genero'),
            'observaciones' => Yii::t('app', 'Observaciones'),
            'status' => Yii::t('app', 'Status'),
        ];

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes() {
        return $this->hasMany(Clientes::className(), ['fk_presona_ref' => 'id_persona']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkCargo() {
        return $this->hasOne(Cargos::className(), ['id_cargo' => 'fk_cargo']);

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
        return $this->hasMany(Proyectos::className(), ['fk_contact_alterno' => 'id_persona']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectos0() {
        return $this->hasMany(Proyectos::className(), ['fk_contacto' => 'id_persona']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectos1() {
        return $this->hasMany(Proyectos::className(), ['fk_lider' => 'id_persona']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios() {
        return $this->hasMany(Usuarios::className(), ['fl_persona' => 'id_persona']);

    }

    /**
     * @inheritdoc
     * @return \app\modules\usuarios\models\query\PersonasQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\modules\usuarios\models\query\PersonasQuery(get_called_class());

    }

    public function afterSave($insert, $changedAttributes) {


        // open image
        $image = Image::getImagine()->open($this->foto->tempName);

        // rendering information about crop of ONE option 
        $cropInfo = Json::decode($this->crop_info)[0];
        $cropInfo['dWidth'] = (int) $cropInfo['dw']; //new width image
        $cropInfo['dHeight'] = (int) $cropInfo['dh']; //new height image
        $cropInfo['x'] = abs($cropInfo['x']);
        $cropInfo['y'] = abs($cropInfo['y']);
        // Properties bolow we don't use in this example
        //$cropInfo['ratio'] = $cropInfo['ratio'] == 0 ? 1.0 : (float)$cropInfo['ratio']; //ratio image. 
        //$cropInfo['width'] = (int)$cropInfo['width']; //width of cropped image
        //$cropInfo['height'] = (int)$cropInfo['height']; //height of cropped image
        //$cropInfo['sWidth'] = (int)$cropInfo['sWidth']; //width of source image
        //$cropInfo['sHeight'] = (int)$cropInfo['sHeight']; //height of source image
        //delete old images
        $oldImages = FileHelper::findFiles(Yii::getAlias('uploads/personas/image'), [
                    'only' => [
                        $this->id_persona . '.*',
                        'thumb_' . $this->id_persona . '.*',
                    ],
        ]);
        for ($i = 0; $i != count($oldImages); $i++) {
            @unlink($oldImages[$i]);
        }

        //saving thumbnail
        $newSizeThumb = new Box($cropInfo['dWidth'], $cropInfo['dHeight']);
        $cropSizeThumb = new Box(200, 200); //frame size of crop
        $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);
        $pathThumbImage = Yii::getAlias('uploads/personas/image')
                . '/thumb_'
                . $this->id_persona
                . '.'
                . $this->foto->getExtension();

        $image->resize($newSizeThumb)
                ->crop($cropPointThumb, $cropSizeThumb)
                ->save($pathThumbImage, ['quality' => 100]);

        //saving original
        $this->foto->saveAs(
                Yii::getAlias('uploads/personas/image')
                . '/'
                . $this->foto
                . '.'
                . $this->foto->getExtension()
        );

    }

}
