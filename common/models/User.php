<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $nombre
 *
 * @property Comentarioalumno[] $comentarioalumnos
 * @property Comentarioespecialidad[] $comentarioespecialidads
 * @property Comentarionoticia[] $comentarionoticias
 * @property Comentarioproyecto[] $comentarioproyectos
 * @property Contacto[] $contactos
 * @property Especialidad[] $especialidads
 * @property Evento[] $eventos
 * @property Experiencia[] $experiencias
 * @property Maestro[] $maestros
 * @property Noticia[] $noticias
 * @property Paginacontacto[] $paginacontactos
 * @property Paginaenlaces[] $paginaenlaces
 * @property Paginaimagenportada[] $paginaimagenportadas
 * @property Paginainicio[] $paginainicios
 * @property Paginanosotros[] $paginanosotros
 * @property Proyecto[] $proyectos
 * @property Ratingespecialidad[] $ratingespecialidads
 * @property Ratingproyecto[] $ratingproyectos
 * @property Slide[] $slides
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    public function getRoleName()
    {
        $roles = Yii::$app->authManager->getRolesByUser($this->id);
        if (!$roles) {
            return null;
        }

        reset($roles);
        /* @var $role \yii\rbac\Role */
        $role = current($roles);

        return $role->name;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarioalumnos()
    {
        return $this->hasMany(Comentarioalumno::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarioespecialidads()
    {
        return $this->hasMany(Comentarioespecialidad::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarionoticias()
    {
        return $this->hasMany(Comentarionoticia::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarioproyectos()
    {
        return $this->hasMany(Comentarioproyecto::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactos()
    {
        return $this->hasMany(Contacto::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEspecialidads()
    {
        return $this->hasMany(Especialidad::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperiencias()
    {
        return $this->hasMany(Experiencia::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaestros()
    {
        return $this->hasMany(Maestro::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticias()
    {
        return $this->hasMany(Noticia::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaginacontactos()
    {
        return $this->hasMany(Paginacontacto::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaginaenlaces()
    {
        return $this->hasMany(Paginaenlaces::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaginaimagenportadas()
    {
        return $this->hasMany(Paginaimagenportada::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaginainicios()
    {
        return $this->hasOne(Paginainicio::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaginanosotros()
    {
        return $this->hasMany(Paginanosotros::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectos()
    {
        return $this->hasMany(Proyecto::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatingespecialidads()
    {
        return $this->hasMany(Ratingespecialidad::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatingproyectos()
    {
        return $this->hasMany(Ratingproyecto::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlides()
    {
        return $this->hasMany(Slide::className(), ['user_id' => 'id']);
    }
    
    
    
    
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password_reset_token' => 'Restablecer Contraseña Token',
            'email' => 'Email',
            'nombre' => 'Nombre',
        ];
    }
}
