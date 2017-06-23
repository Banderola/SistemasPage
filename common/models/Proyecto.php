<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "proyecto".
 *
 * @property integer $idProyecto
 * @property string $Titulo
 * @property string $Descripcion
 * @property string $Url
 * @property string $Imagen
 * @property integer $user_id
 * @property string $Fecha
 *
 * @property integer $categoriaProyecto_idcategoriaProyecto
 * @property Categoriaproyecto $categoriaProyectoIdcategoriaProyecto
 * @property User $user
 * @property Ratingproyecto[] $ratingproyectos
 */
class Proyecto extends \yii\db\ActiveRecord
{
    public $rating;
    public $nombre;
	public $_image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyecto';
    }
	
	public function beforeSave($insert)
    {
        if (is_string($this->_image) && strstr($this->_image, 'data:image')) {

            // creating image file as png
            $data = $this->_image;
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
            $fileName = time() . '-' . rand(100000, 999999) . '.png';
            file_put_contents(Yii::getAlias('@uploadPath') . '\\' . $fileName, $data);
            // deleting old image 
            // $this->image is real attribute for filename in table
            // customize your code for your attribute            
            if (!$this->isNewRecord && !empty($this->imagen)) {
                unlink(Yii::getAlias('@uploadPath'.'\\'.$this->imagen));
            }
            
            // set new filename
            $this->imagen = $fileName;
        }

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'Fecha', 'categoriaProyecto_idcategoriaProyecto'], 'required'],
			[['user_id', 'categoriaProyecto_idcategoriaProyecto'], 'integer'],
            [['Fecha'], 'safe'],
            [['Titulo', 'Imagen'], 'string', 'max' => 45],
            [['Descripcion'], 'string', 'max' => 255],
            [['Url'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
			[['categoriaProyecto_idcategoriaProyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Categoriaproyecto::className(), 'targetAttribute' => ['categoriaProyecto_idcategoriaProyecto' => 'idcategoriaProyecto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProyecto' => 'IdProyecto',
            'Titulo' => 'Titulo',
            'Descripcion' => 'Descripcion',
            'Url' => 'Url',
            'Imagen' => 'Imagen',
            'user_id' => 'UserID',
            'Fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriaProyectoIdcategoriaProyecto()
    {
        return $this->hasOne(Categoriaproyecto::className(), ['idcategoriaProyecto' => 'categoriaProyecto_idcategoriaProyecto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatingproyectos()
    {
        return $this->hasMany(Ratingproyecto::className(), ['Proyecto_idProyecto' => 'idProyecto']);
    }
	
	public function getCategoriaProyectoIdcategoriaProyecto()
    {
        return $this->hasOne(Categoriaproyecto::className(), ['idcategoriaProyecto' => 'categoriaProyecto_idcategoriaProyecto']);
    }
    
    public function getCountrating()
    {
        if(Yii::$app->user->isGuest){
            return $this->hasOne(Ratingproyecto::className(), ['Proyecto_idProyecto' => 'idProyecto'])
                ->select('AVG(Rating) AS cnt')
                ->where('user_id=0');
        }
        else{
            return $this->hasOne(Ratingproyecto::className(), ['Proyecto_idProyecto' => 'idProyecto'])
                ->select('AVG(Rating) AS cnt')
                ->where('user_id='.Yii::$app->user->getId());
            
        }
        
                
    }
}
