<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Alumno;


class StudentForm extends Model
{
    public $nombre;
	public $foto;
	
    public function rules()
    {
        return [
            [['nombre'],'required'],
			[['foto'], 'safe']
        ];
    }
	
	public function addNew(){
        if($this->validate()){
            $proyecto=new Alumno();
            $proyecto->nombre=$this->nombre;
            $proyecto->foto=foto;
            return $proyecto->save();
        }
    }
}