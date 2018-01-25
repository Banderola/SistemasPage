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
            $evento->imagen=$this->imagen;
            $evento->user_id=Yii::$app->getUser()->getId();
            $evento->lugar=$this->lugar;
            $evento->fecha=$this->fecha;
            $evento->hora_inicio=$this->horai;
            $evento->hora_fin=$this->horaf;
            return $evento->save();
        }
    }
	
	public function modifyExisting($found){
		if($this->validate()){
                        $found->imagenOld=$found->Imagen;
			$found->imagen=$this->imagen;
			$found->titulo=$this->titulo;
			$found->descripcion=$this->descripcion;
			$found->fecha=$this->fecha;
			$found->lugar=$this->lugar;
			$found->hora_inicio=$this->horai;
			$found->hora_fin=$this->horaf;
			$found->user_id=Yii::$app->getUser()->getId();
			return $found->save();
		}
	}
	
	public function fillFromExisting($found){
		$this->imagen=$found->imagen;
		$this->titulo=$found->titulo;
		$this->descripcion=$found->descripcion;
		$this->fecha=$found->fecha;
		$this->lugar=$found->lugar;
		$this->horai=$this->getHour($found->hora_inicio);
		$this->horaf=$this->getHour($found->hora_fin);
	}
	
	private function getHour($hora){
		$array=explode(':',$hora);
		return $array[0].$array[1];
	}
}