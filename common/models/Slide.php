<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slide".
 *
 * @property integer $idSlide
 * @property string $Titulo
 * @property string $Descripcion
 * @property string $Imagen
 * @property integer $user_id
 * @property User $user
 */
class Slide extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slide';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['Titulo'], 'string', 'max' => 45],
            [['Descripcion'], 'string', 'max' => 500],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['Imagen'],'safe'],
        ];
    }
    
    public function beforeSave($insert)
    {
        if (is_string($this->Imagen) && strstr($this->Imagen, 'data:image')) {

            // creating image file as png
            $data = $this->Imagen;
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
            $fileName = time() . '-' . rand(100000, 999999) . '.png';
            file_put_contents(Yii::getAlias('@uploadPath') . '\\' . $fileName, $data);
            // deleting old image 
            // $this->image is real attribute for filename in table
            // customize your code for your attribute            
            if (!$this->isNewRecord && !empty($this->Imagen)) {
              //  unlink(Yii::getAlias('@uploadPath'.'\\'.$this->imagen));
            }
            
            // set new filename
            $this->Imagen = $fileName;
        }

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSlide' => 'Id Slide',
            'Titulo' => 'Titulo',
            'Descripcion' => 'Descripcion',
            'Imagen' => 'Imagen',
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
