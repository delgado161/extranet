<?php

namespace app\modules\usuarios\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $id_usuario
 * @property integer $fl_perfil
 * @property integer $fl_persona
 * @property string $username
 * @property string $clave
 * @property string $ultimo_login
 * @property integer $status
 *
 * @property Recursos[] $recursos
 * @property Reportes[] $reportes
 * @property Perfiles $flPerfil
 * @property Personas $flPersona
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    public $nombre_perfil;
    public $nombre_persona;
    public $apellido_persona;
    public $validate_clave;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'usuarios';

    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['fl_perfil', 'fl_persona', 'username', 'clave', 'status'], 'required'],
            [['fl_perfil', 'fl_persona', 'status'], 'integer'],
            [['ultimo_login'], 'safe'],
            [['clave'], 'string', 'max' => 200],
            ['validate_clave', 'required'],
            ['validate_clave', 'compare', 'compareAttribute' => 'clave', 'message' => "Passwords don't match"],
            [['fl_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfiles::className(), 'targetAttribute' => ['fl_perfil' => 'id_perfile']],
            [['fl_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['fl_persona' => 'id_persona']],
        ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_usuario' => Yii::t('app', 'Id Usuario'),
            'fl_perfil' => Yii::t('app', 'Fl Perfil'),
            'fl_persona' => Yii::t('app', 'Fl Persona'),
            'username' => Yii::t('app', 'Username'),
            'clave' => Yii::t('app', 'Clave'),
            'ultimo_login' => Yii::t('app', 'Ultimo Login'),
            'status' => Yii::t('app', 'Status'),
        ];

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecursos() {
        return $this->hasMany(Recursos::className(), ['fk_usuario' => 'id_usuario']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportes() {
        return $this->hasMany(Reportes::className(), ['fk_usuario' => 'id_usuario']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlPerfil() {
        return $this->hasOne(Perfiles::className(), ['id_perfile' => 'fl_perfil']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlPersona() {
        return $this->hasOne(Personas::className(), ['id_persona' => 'fl_persona']);

    }

    /**
     * @inheritdoc
     * @return UsuariosQuery the active query used by this AR class.
     */
    public static function find() {
        return new query\UsuariosQuery(get_called_class());

    }

    public function getAuthKey() {
        throw new \yii\base\NotSupportedException();

    }

    public function getId() {
        return $this->id_usuario;

    }

    public function validateAuthKey($authKey) {
        throw new \yii\base\NotSupportedException();

    }

    public static function findIdentity($id) {
        return self::findOne($id);

    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new \yii\base\NotSupportedException();

    }

    public static function findByLogin($username) {
        return self::findOne(['username' => $username]);

    }

    public function validatePassword($password) {
        return $this->clave === md5($password);

    }

}
