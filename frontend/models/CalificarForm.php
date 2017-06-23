<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Ratingespecialidad;
use common\models\Ratingproyecto;
use yii\helpers\Html;
/**
 * CalificarForm is the model behind the contact form.
 */
class CalificarForm extends Model
{
    public $idEspecialidad;
    public $rating;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['idEspecialidad', 'rating'], 'required'],
            ['rating', 'validateCal'],
        ];
    }
    
    public function validateCal($attribute, $params)
    {
        if (!$this->hasErrors()) {
       
            if (Yii::$app->user->isGuest) {
                
                $resent = Html::a('Requiere Iniciar Sesion para Calificar', ['site/login'], ['class' => 'profile-link']);
                $this->addError($attribute,$resent);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rating' => 'Rating',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function addCalificacionespecialidad()
    {
        if($this->validate()){
            $consulta=Ratingespecialidad::findOne(['user_id' => Yii::$app->getUser()->getId(),'Especialidad_idEspecialidades' => $this->idEspecialidad,]);
            if($consulta==null){
               $calificacion=new Ratingespecialidad(); 
               $calificacion->user_id=Yii::$app->getUser()->getId();
            }
            else{
                $calificacion=$consulta;
            }
            $calificacion->Especialidad_idEspecialidades=$this->idEspecialidad;
            $calificacion->Rating=$this->rating;
            return $calificacion->save();
            
        }
        return false;
        
    }
    
    public function addCalificacionproyecto()
    {
        if($this->validate()){
            $consulta= Ratingproyecto::findOne(['user_id' => Yii::$app->getUser()->getId(),'Proyecto_idProyecto' => $this->idEspecialidad,]);
            if($consulta==null){
               $calificacion=new Ratingproyecto(); 
               $calificacion->user_id=Yii::$app->getUser()->getId();
            }
            else{
                $calificacion=$consulta;
            }
            $calificacion->Proyecto_idProyecto=$this->idEspecialidad;
            $calificacion->Rating=$this->rating;
            return $calificacion->save();
            
        }
        return false;
        
    }
    
}

