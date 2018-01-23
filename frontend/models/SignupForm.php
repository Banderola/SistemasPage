<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $nombre;
    public $photo;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
            ['nombre', 'required'],
            ['nombre', 'string', 'min' => 5, 'max' => 255],
            
            ['photo', 'required'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'photo' => 'Avatar',
            'username' => 'Nombre de Usuario',
            'email' => 'Correo Electrónico',
            'password' => 'Contraseña',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->nombre = $this->nombre;
        $user->email = $this->email;
        $user->imagen = $this->photo;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $ses=$user->save() ? $user : null;
        if($ses!=null){
            $auth = \Yii::$app->authManager;
            $authorRole = $auth->getRole('cliente');
            $auth->assign($authorRole, $user->getId());
        }
        return $ses;
    }
}
