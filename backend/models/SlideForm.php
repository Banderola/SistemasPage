<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Slide;

class SlideForm extends Model
{
    public $titulo;
	public $descripcion;
	public $imagen;


    public function rules()
    {
        return [
            [['titulo','descripcion','imagen'],'required'],
			[['titulo','descripcion','imagen'],'safe'],
        ];
    }
    
    public function addNew(){
        if($this->validate()){
            $new=new Slide();
			$new->Titulo=$this->titulo;
			$new->Descripcion=$this->descripcion;
			$new->Imagen=$this->imagen;
			$new->user_id=Yii::$app->getUser()->getId();
            return $new->save();
        }
    }
	
	public function modifyExisting($found){
		if($this->validate()){
                        $found->imagenOld=$found->Imagen;
			$found->Titulo=$this->titulo;
			$found->Descripcion=$this->descripcion;
			$found->Imagen=$this->imagen;
			return $found->save();
		}
	}
	
	public function fillFromExisting($found){
		$this->titulo=$found->Titulo;
		$this->imagen=$found->Imagen;
		$this->descripcion=$found->Descripcion;
	}
}