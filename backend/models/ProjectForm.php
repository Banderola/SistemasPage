<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Proyecto;

class ProjectForm extends Model
{
    public $imagen;
    public $titulo;
    public $descripcion;
    public $link;
	public $categoria_id;
    
    public function rules()
    {
        return [
            [['titulo','descripcion','link', 'categoria_id'],'required'],
			['imagen', 'safe']
        ];
    }
    
    public function addNew(){
        if($this->validate()){
            $proyecto=new Proyecto();
            $proyecto->Titulo=$this->titulo;
            $proyecto->Descripcion=$this->descripcion;
            $proyecto->Url=$this->link;
            $proyecto->user_id=Yii::$app->getUser()->getId();
			$proyecto->categoriaProyecto_idcategoriaProyecto=$this->categoria_id;
			$proyecto->Fecha=date("Y-m-d H:i:s");
            return $proyecto->save();
        }
    }
}