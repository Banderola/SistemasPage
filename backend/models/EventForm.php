<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Evento;

class EventForm extends Model
{
    public $imagen;
    public $titulo;
    public $descripcion;
	public $fecha;
	public $lugar;
	public $horai;
	public $horaf;
	
    
    public function rules()
    {
        return [
            [['titulo','descripcion','lugar','horai','horaf','fecha'],'required'],
			['imagen', 'safe'],
			[['horai','horaf'], 'integer', 'max' => 2359, 'min' => 0000],
			[['horai','horaf'], 'string', 'min' => 4,'max' =>4]
        ];
    }
    
    public function addNew(){
        if($this->validate()){
            $evento=new Evento();
            $evento->titulo=$this->titulo;
            $evento->descripcion=$this->descripcion;
            $evento->user_id=Yii::$app->getUser()->getId();
			$evento->lugar=$this->lugar;
			$evento->fecha=$this->fecha;
			$evento->hora_inicio=$this->horai;
			$evento->hora_fin=$this->horaf;
            return $evento->save();
        }
    }
}