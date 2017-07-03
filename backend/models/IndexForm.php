<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Paginainicio;

class IndexForm extends Model
{
    public $tituloPortada;
	public $descripcionPortada;
	public $cantidadAlumnos;
	public $cantidadPremios;
	public $imagenAlumnos;
	public $imagenCifras;

    public function rules()
    {
        return [
			[['titulo','descripcionPortada','cantidadAlumnos','cantidadPremios','imagenAlumnos','imagenCifras'],'safe'],
			[['cantidadAlumnos','cantidadPremios'],'integer'],
			[['imagenAlumnos','imagenCifras'],'default','value'=>'1.jpg']
        ];
    }
    
    public function addNew(){
        if($this->validate()){
            $new=new Paginainicio();
			$new->user_id=Yii::$app->getUser()->getId();
			$new->tituloPortada=$this->tituloPortada;
			$new->descripcionPortada=$this->descripcionPortada;
			$new->cantidadAlumnos=$this->cantidadAlumnos;
			$new->cantidadPremios=$this->cantidadPremios;
			$new->imagenAlumnos=$this->imagenAlumnos;
			$new->imagenCifras=$this->imagenCifras;
            return $new->save();
        }
    }
	
	public function modifyExisting($found){
		if($this->validate()){
			$found->user_id=Yii::$app->getUser()->getId();
			$found->tituloPortada=$this->tituloPortada;
			$found->descripcionPortada=$this->descripcionPortada;
			$found->cantidadAlumnos=$this->cantidadAlumnos;
			$found->cantidadPremios=$this->cantidadPremios;
			$found->imagenAlumnos=$this->imagenAlumnos;
			$found->imagenCifras=$this->imagenCifras;
			return $found->save();
		}
	}
	
	public function fillFromExisting($found){
		$this->tituloPortada=$found->tituloPortada;
		$this->descripcionPortada=$found->descripcionPortada;
		$this->cantidadAlumnos=$found->cantidadAlumnos;
		$this->cantidadPremios=$found->cantidadPremios;
		$this->imagenAlumnos=$found->imagenAlumnos;
		$this->imagenCifras=$found->imagenCifras;
	}
}