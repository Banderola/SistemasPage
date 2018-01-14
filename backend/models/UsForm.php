<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Paginanosotros;

class UsForm extends Model
{
	public $descripcion;
	public $imagen;

    public function rules()
    {
        return [
                        [['descripcion','imagen'],'required'],
			[['imagen'],'safe'],
                        
			//['imagen','default','value'=>'1.jpg']
        ];
    }
    
    public function addNew(){
        if($this->validate()){
            $new=new Paginanosotros();
			$new->user_id=Yii::$app->getUser()->getId();
			$new->descripcion=$this->descripcion;
			$new->imagen=$this->imagen;
            return $new->save();
        }
    }
	
	public function modifyExisting($found){
		if($this->validate()){
			$found->user_id=Yii::$app->getUser()->getId();
			$found->descripcion=$this->descripcion;
			$found->imagen=$this->imagen;
			return $found->save();
		}
	}
	
	public function fillFromExisting($found){
		$this->descripcion=$found->descripcion;
		$this->imagen=$found->imagen;
	}
}