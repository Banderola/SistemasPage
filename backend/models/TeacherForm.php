<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Maestro;

class TeacherForm extends Model
{
    public $nombre;
	public $foto;
	public $descripcion;
	public $f;
	public $t;
	public $g;
	public $i;
	
    public function rules()
    {
        return [
            [['nombre'],'required'],
			[['foto','nombre','descripcion','f','t','g','i'], 'safe'],
			[['f','t','g','i'],'url']
        ];
    }
	
	public function addNew(){
        if($this->validate()){
            $proyecto=new Maestro();
            $proyecto->nombre=$this->nombre;
            $proyecto->imagen=$this->foto;
			$proyecto->user_id=Yii::$app->getUser()->getId();
			$proyecto->tipo='Teacher';
			$proyecto->descripcion=$this->descripcion;
			$proyecto->linkFace=$this->f;
			$proyecto->linkTwitter=$this->t;
			$proyecto->linkGoogle=$this->g;
			$proyecto->linkInstagram=$this->i;
            return $proyecto->save();
        }
    }
	
	public function modifyExisting($found){
		if($this->validate()){
			$found->imagen=$this->foto;
			$found->nombre=$this->nombre;
			$found->descripcion=$this->descripcion;
			$found->user_id=Yii::$app->getUser()->getId();
			$found->linkFace=$this->f;
			$found->linkTwitter=$this->t;
			$found->linkGoogle=$this->g;
			$found->linkInstagram=$this->i;
			return $found->save();
		}
	}
	
	public function fillFromExisting($found){
		$this->foto=$found->imagen;
		$this->nombre=$found->nombre;
		$this->descripcion=$found->descripcion;
		$this->f=$found->linkFace;
		$this->t=$found->linkTwitter;
		$this->g=$found->linkGoogle;
		$this->i=$found->linkInstagram;
	}
}