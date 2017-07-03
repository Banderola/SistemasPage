<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Paginacontacto;

class ContactForm extends Model
{
    public $telefono;
	public $correo;
	public $direccion;
	public $faceLink;
	public $rssLink;
	public $googleLink;
	public $pintLink;
	public $instagramLink;
	public $paginaWeb;
	public $PiePagina;

    public function rules()
    {
        return [
			[['telefono','correo','direccion','faceLink','rssLink','googleLink','pintLink','instagramLink','paginaWeb','PiePagina'],'safe'],
			[['faceLink','rssLink','googleLink','pintLink','instagramLink','paginaWeb'],'url'],
			[['telefono'],'integer'],
			['telefono','string','max'=>10,'min'=>10],
			['correo','email']
        ];
    }
    
    public function addNew(){
        if($this->validate()){
            $new=new Paginacontacto();
			$new->user_id=Yii::$app->getUser()->getId();
			$new->telefono=$this->telefono;
			$new->correo=$this->correo;
			$new->direccion=$this->direccion;
			$new->faceLink=$this->faceLink;
			$new->rssLink=$this->rssLink;
			$new->googleLink=$this->googleLink;
			$new->pintLink=$this->pintLink;
			$new->instagramLink=$this->instagramLink;
			$new->paginaWeb=$this->paginaWeb;
			$new->PiePagina=$this->PiePagina;
            return $new->save();
        }
    }
	
	public function modifyExisting($found){
		if($this->validate()){
			$found->user_id=Yii::$app->getUser()->getId();
			$found->telefono=$this->telefono;
			$found->correo=$this->correo;
			$found->direccion=$this->direccion;
			$found->faceLink=$this->faceLink;
			$found->rssLink=$this->rssLink;
			$found->googleLink=$this->googleLink;
			$found->pintLink=$this->pintLink;
			$found->instagramLink=$this->instagramLink;
			$found->paginaWeb=$this->paginaWeb;
			$found->PiePagina=$this->PiePagina;
			return $found->save();
		}
	}
	
	public function fillFromExisting($found){
		$this->telefono=$found->telefono;
		$this->correo=$found->correo;
		$this->direccion=$found->direccion;
		$this->faceLink=$found->faceLink;
		$this->rssLink=$found->rssLink;
		$this->googleLink=$found->googleLink;
		$this->pintLink=$found->pintLink;
		$this->instagramLink=$found->instagramLink;
		$this->paginaWeb=$found->paginaWeb;
		$this->PiePagina=$found->PiePagina;
	}
}