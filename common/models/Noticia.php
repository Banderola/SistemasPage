<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "noticia".
 *
 * @property integer $idnoticia
 * @property string $titulo
 * @property string $descripcion
 * @property string $imagen
 * @property integer $visitas
 * @property integer $user_id
 * @property string $link
 *
 * @property Comentarionoticia[] $comentarionoticias
 * @property User $user
 */
class Noticia extends \yii\db\ActiveRecord
{
	public $_image;
    public $cnt;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noticia';
    }

    /**
     * @inheritdoc
     */
	 
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
	
	
    public function rules()
    {
        return [
            [['visitas', 'user_id'], 'integer'],
            [['user_id'], 'required'],
            [['titulo', 'imagen'], 'string', 'max' => 45],
            [['descripcion', 'link'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
			['_image', 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idnoticia' => 'Idnoticia',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
            'visitas' => 'Visitas',
            'user_id' => 'User_ID',
            'link' => 'Link',
			'fecha' => 'Fecha'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarionoticias()
    {
        return $this->hasMany(Comentarionoticia::className(), ['noticia_idnoticia' => 'idnoticia'])
                ->select('comentarionoticia.*, nombre, imagen')
                ->leftJoin('user','comentarionoticia.user_id=user.id')
                ->groupBy('idcomentarioNoticia')
                ->with('user')
                ->orderBy('Fecha DESC');
    }
    
    public function getCuentacomentario()
    {
        return $this->hasMany(Comentarionoticia::className(), ['noticia_idnoticia' => 'idnoticia'])
                ->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
	
}
