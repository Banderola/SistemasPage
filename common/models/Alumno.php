<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "alumno".
 *
 * @property integer $idAlumno
 * @property string $nombre
 * @property integer $user_id
 * @property string $foto
 * @property string $descripcion
 * @property string $fecha
 *
 * @property User $user
 */
class Alumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['nombre','descripcion','fecha'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
			[['fecha'], 'default', 'value' => date('Y-m-d')],
            [['foto'],'safe'],
        ];
    }
    
     public function beforeSave($insert)
    {
        if (is_string($this->foto) && strstr($this->foto, 'data:image')) {

            // creating image file as png
            $data = $this->foto;
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
            $fileName = time() . '-' . rand(100000, 999999) . '.png';
            file_put_contents(Yii::getAlias('@uploadPath') . '\\' . $fileName, $data);
            // deleting old image 
            // $this->image is real attribute for filename in table
            // customize your code for your attribute            
            if (!$this->isNewRecord && !empty($this->foto)) {
              //  unlink(Yii::getAlias('@uploadPath'.'\\'.$this->imagen));
            }
            
            // set new filename
            $this->foto = $fileName;
        }

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAlumno' => 'IdAlumno',
            'nombre' => 'Nombre',
            'user_id' => 'UserID',
	    'foto' => 'Foto',
            'descripcion' => 'Descripcion',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
