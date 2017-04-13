<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Comentarioespecialidad;
use common\models\Comentarioproyecto;
use common\models\Comentarionoticia;

/**
 * CalificarForm is the model behind the contact form.
 */
class ComentarForm extends Model
{
    public $idEspecialidad;
    public $descripcion;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['idEspecialidad', 'descripcion'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'descripcion' => 'caja de comentarios',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function addComentarioespecialidad()
    {
        
        if($this->validate()){
            $comentario = new Comentarioespecialidad();
            $comentario->Descripcion = $this->descripcion;
            $comentario->Fecha = (new \DateTime("now", new \DateTimeZone('America/Mexico_City')))->format('Y-m-d H:i:s');
            $comentario->Especialidad_idEspecialidades = $this->idEspecialidad;
            $comentario->user_id = Yii::$app->getUser()->getId();
            return $comentario->save();
            
        }
        return false;
        
    }
    
    public function addComentarioproyecto()
    {
        
        if($this->validate()){
            $comentario = new Comentarioproyecto();
            $comentario->Descripcion = $this->descripcion;
            $comentario->Fecha = (new \DateTime("now", new \DateTimeZone('America/Mexico_City')))->format('Y-m-d H:i:s');
            $comentario->Proyecto_idProyecto = $this->idEspecialidad;
            $comentario->user_id = Yii::$app->getUser()->getId();
            return $comentario->save();
            
        }
        return false;
        
    }
    
    
}
