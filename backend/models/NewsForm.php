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
        return array(
            array('titulo', 'required'),
            array('descripcion', 'required'),
            array('link', 'required'),
            array('imagen','safe','on'=>'insert'),
    );
    }
    
    public function addNew(){
        if($this->validate()){
            $noticia=new Noticia();
            $noticia->titulo=$this->titulo;
            $noticia->descripcion=$this->descripcion;
            $noticia->link=$this->link;
            $noticia->imagen=$this->getNombre();
            $noticia->user_id=Yii::$app->getUser()->getId();
            $noticia->visitas=0;
            return $noticia->save();
        }
        else{
        }
    }
    
    public function getNombre(){
        $array=explode('/',$this->imagen);
        return $array[sizeof($array)-1];
    }
}