<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Paginaimagenportada;

class FrontpageForm extends Model
{
	public $imagen;
	public $descripcion;


    public function rules()
    {
        return [
            [['descripcion'],'required'],
			[['descripcion','imagen'],'safe'],
			['imagen','default', 'value' => '1.jpg']
        ];
    }
    
    public function addNew(){
        if($this->validate()){
            $new=new Paginaimagenportada();
			$new->descripcion=$this->descripcion;
			$new->imagen=$this->imagen;
			$new->user_id=Yii::$app->getUser()->getId();
            return $new->save();
        }
    }
	
	public function modifyExisting($found){
		if($this->validate()){
			$found->descripcion=$this->descripcion;
			$found->imagen=$this->imagen;
			return $found->save();
		}
	}
	
	public function fillFromExisting($found){
		$this->imagen=$found->imagen;
		$this->descripcion=$found->descripcion;
	}
}