<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Comentarioalumno;


class StudentCommentForm extends Model
{
    public $descripcion;
	
    public function rules()
    {
        return [
            [['descripcion'],'required']
        ];
    }
	
	public function addNew(){
        if($this->validate()){
            $proyecto=new Comentarioalumno();
            $proyecto->Descripcion=$this->descripcion;
            $proyecto->Fecha=date("Y-m-d H:i:s");
            return $proyecto->save();
        }
    }
	
}