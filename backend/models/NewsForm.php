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
            [['titulo','descripcion','link'],'required']
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
            return $noticia->save();
        }
    }
}