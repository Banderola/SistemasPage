<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use Yii;
/**
 * Signup form
 */
class CuentaForm extends Model
{
    public $email;
    public $password;
    public $nombre;
    public $imagen;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],

            ['password', 'string', 'min' => 6],
            
            ['nombre', 'required'],
            ['nombre', 'string', 'min' => 5, 'max' => 255],
            ['foto', 'safe'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function registrar($found)
    {
        if (!$this->validate() || Yii::$app->user->isGuest) {
            return null;
        }
        
        $user = $found;
        $user->nombre = $this->nombre;
        $user->email = $this->email;
        if($this->password!=null){
            $user->setPassword($this->password);
            $user->generateAuthKey();
        }
        $user->imagen=$this->imagen;
        $ses=$user->save() ? $user : null;
        return $ses;
    }
    
    public function fillFromExisting($found){
                $this->nombre = $found->nombre;
                $this->email = $found->email;
                $this->imagen = $found->imagen;
    }
}
