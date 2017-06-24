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

class SpecialityForm extends Model
{
    public $imagen;
    public $titulo;
    public $descripcion;
    public $categoria;
	public $maestro_id;


    public function rules()
    {
        return [
            [['titulo','descripcion','categoria'],'required'],
			[['imagen','maestro_id'],'safe']
        ];
    }
    
    public function addNew(){
        if($this->validate()){
            $especialidad=new Especialidad();
            $especialidad->Titulo=$this->titulo;
            $especialidad->Descripcion=$this->descripcion;
            $especialidad->CategoriaEspecialidad_idCategoriaEspecialidad=$this->categoria;
            $especialidad->imagen=$this->imagen;
            $especialidad->user_id=Yii::$app->getUser()->getId();
            $especialidad->Visitas=0;
			$especialidad->Maestro_idMaestro=$this->maestro_id;
            return $especialidad->save();
        }
    }
}