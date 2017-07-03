<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Experiencia;

class ExperienceForm extends Model
{
    public $descripcion;
	public $valor;
	public $orientacion;
	
    
    public function rules()
    {
        return [
            [['descripcion','valor','orientacion'],'required'],
			[['descripcion','valor','orientacion'], 'safe'],
			[['valor','orientacion'], 'integer'],
			['orientacion', 'integer', 'max'=>1,'min' =>0],
			['valor','integer','max'=>100, 'min'=>0]
        ];
    }
    
    public function addNew(){
        if($this->validate()){
            $evento=new Experiencia();
            $evento->descripcion=$this->descripcion;
            $evento->valor=$this->valor;
            $evento->user_id=Yii::$app->getUser()->getId();
			$evento->orientacion=$this->orientacion;
            return $evento->save();
        }
    }
	
	public function modifyExisting($found){
		if($this->validate()){
			$found->descripcion=$this->descripcion;
			$found->valor=$this->valor;
			$found->orientacion=$this->orientacion;
			$found->user_id=Yii::$app->getUser()->getId();
			return $found->save();
		}
	}
	
	public function fillFromExisting($found){
		$this->descripcion=$found->descripcion;
		$this->valor=$found->valor;
		$this->orientacion=$found->orientacion;
	}
}