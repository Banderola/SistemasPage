<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Categoriaespecialidad;

class SpecialityCategoryForm extends Model
{
    public $nombre;


    public function rules()
    {
        return [
            [['nombre'],'required'],
        ];
    }
    
    public function addNew(){
        if($this->validate()){
            $especialidad=new Categoriaespecialidad();
			$especialidad->Nombre = $this->nombre;
            return $especialidad->save();
        }
    }
}