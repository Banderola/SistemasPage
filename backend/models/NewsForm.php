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
	public $_image;
    
    public function rules()
    {
        return [
            [['titulo','descripcion','link'],'required'],
			 ['_image', 'safe']
        ];
    }
	
	public function beforeSave($insert)
    {
        if (is_string($this->_image) && strstr($this->_image, 'data:image')) {

            // creating image file as png
            $data = $this->_image;
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
            $fileName = time() . '-' . rand(100000, 999999) . '.png';
            file_put_contents(Yii::getAlias('@uploadPath') . '/' . $fileName, $data);


            // deleting old image 
            // $this->image is real attribute for filename in table
            // customize your code for your attribute            
            if (!$this->isNewRecord && !empty($this->imagen)) {
                unlink(Yii::getAlias('@uploadPath/'.$this->imagen));
            }
            
            // set new filename
            $this->imagen = $fileName;
        }

        return parent::beforeSave($insert);
    }
    
    public function addNew(){
        if($this->validate()){
            $noticia=new Noticia();
            $noticia->titulo=$this->titulo;
            $noticia->descripcion=$this->descripcion;
            $noticia->link=$this->link;
            $noticia->imagen=$this->imagen;
            $noticia->user_id=Yii::$app->getUser()->getId();
            $noticia->visitas=0;
            return $noticia->save();
        }
    }
}