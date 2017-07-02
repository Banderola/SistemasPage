<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Noticia;

class NewsForm extends Model
{
    public $imagen;
    public $titulo;
    public $descripcion;
    public $link;
    
    public function rules()
    {
        return [
            [['titulo','descripcion','link'],'required'],
			['imagen', 'safe']
        ];
    }
    
    public function addNew(){
        if($this->validate()){
            $noticia=new Noticia();
            $noticia->titulo=$this->titulo;
            $noticia->descripcion=$this->descripcion;
            $noticia->link=$this->link;
            $noticia->user_id=Yii::$app->getUser()->getId();
            $noticia->visitas=0;
			$noticia->fecha=date("Y-m-d H:i:s");
            return $noticia->save();
        }
    }
	
	public function modifyExisting($found){
		if($this->validate()){
			$found->imagen=$this->imagen;
			$found->titulo=$this->titulo;
			$found->descripcion=$this->descripcion;
			$found->link=$this->link;
			return $found->save();
		}
	}
	
	public function fillFromExisting($found){
		$this->imagen=$found->imagen;
		$this->titulo=$found->titulo;
		$this->descripcion=$found->descripcion;
		$this->link=$found->link;
	}
}