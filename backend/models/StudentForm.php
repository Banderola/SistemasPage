<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Alumno;

class StudentForm extends Model
{
        public $nombre;
	public $foto;
	public $comentario;
	public $fechaComentario;
	
    public function rules()
    {
        return [
            [['nombre','foto'],'required'],
			[['foto','nombre','comentario','fechaComentario'], 'safe'],
        ];
    }
	
	public function addNew(){
        if($this->validate()){
            $proyecto=new Alumno();
            $proyecto->nombre=$this->nombre;
            $proyecto->foto=$this->foto;
            $proyecto->user_id=Yii::$app->getUser()->getId();
            $proyecto->descripcion=$this->comentario;
            $proyecto->fecha=$this->fechaComentario;
            return $proyecto->save();
        }
    }
	
	public function modifyExisting($found){
		if($this->validate()){
                        $found->imagenOld=$found->foto;
			$found->foto=$this->foto;
			$found->nombre=$this->nombre;
			$found->descripcion=$this->comentario;
			$found->user_id=Yii::$app->getUser()->getId();
			$found->fecha=$this->fechaComentario;
			return $found->save();
		}
	}
	
	public function fillFromExisting($found){
		$this->foto=$found->foto;
		$this->nombre=$found->nombre;
		$this->comentario=$found->descripcion;
		$this->fechaComentario=$found->fecha;
	}
}