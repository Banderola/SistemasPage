<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Especialidad;

class Speciality extends Model
{
    public $imagen;
    public $titulo;
    public $descripcion;
    public $categoria;
    public $tipo;


    public function rules()
    {
        return [
            [['titulo','descripcion'],'required'],
        ];
    }
    
    public function addSpeciality(){
        if($this->validate()){
            $especialidad=new Especialidad();
            $especialidad->titulo=$this->titulo;
            $especialidad->descripcion=$this->descripcion;
            $especialidad->categoria=$this->categoria;
            $especialidad->imagen=$this->imagen;
            $especialidad->user_id=Yii::$app->getUser()->getId();
            $especialidad->visitas=0;
            return $especialidad->save();
        }
    }
}