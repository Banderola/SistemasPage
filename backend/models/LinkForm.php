<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Paginaenlaces;

class LinkForm extends Model
{
    public $titulo;
    public $link;
	
    
    public function rules()
    {
        return [
            [['titulo','link'],'required'],
			['link', 'url']
        ];
    }
    
    public function addNew(){
        if($this->validate()){
            $evento=new Paginaenlaces();
            $evento->titulo=$this->titulo;
            $evento->link=$this->link;
            $evento->user_id=Yii::$app->getUser()->getId();
            return $evento->save();
        }
    }
	
	public function modifyExisting($found){
		if($this->validate()){
			$found->titulo=$this->titulo;
			$found->link=$this->link;
			$found->user_id=Yii::$app->getUser()->getId();
			return $found->save();
		}
	}
	
	public function fillFromExisting($found){
		$this->titulo=$found->titulo;
		$this->link=$found->link;
	}
}