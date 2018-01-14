<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paginaimagenportada".
 *
 * @property integer $idPaginaImagenPortada
 * @property string $imagen
 * @property string $descripcion
 * @property integer $user_id
 *
 * @property User $user
 */
class Paginaimagenportada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paginaimagenportada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','descripcion'], 'required'],
            [['user_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['imagen'],'safe'],
        ];
    }
    
    public function beforeSave($insert)
    {
        if (is_string($this->imagen) && strstr($this->imagen, 'data:image')) {

            // creating image file as png
            $data = $this->imagen;
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
            $fileName = time() . '-' . rand(100000, 999999) . '.png';
            file_put_contents(Yii::getAlias('@uploadPath') . '\\' . $fileName, $data);
            // deleting old image 
            // $this->image is real attribute for filename in table
            // customize your code for your attribute            
            if (!$this->isNewRecord && !empty($this->imagen)) {
              //  unlink(Yii::getAlias('@uploadPath'.'\\'.$this->imagen));
            }
            
            // set new filename
            $this->imagen = $fileName;
        }

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPaginaImagenPortada' => 'Id Pagina Imagen Portada',
            'imagen' => 'Imagen',
            'descripcion' => 'Descripcion',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
