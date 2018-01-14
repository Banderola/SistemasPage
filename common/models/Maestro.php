<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "maestro".
 *
 * @property integer $idMaestro
 * @property string $nombre
 * @property string $tipo
 * @property string $imagen
 * @property string $descripcion
 * @property string $linkFace
 * @property string $linkTwitter
 * @property string $linkGoogle
 * @property string $linkInstagram
 * @property integer $user_id
 *
 * @property Especialidad[] $especialidads
 * @property User $user
 */
class Maestro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maestro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['nombre', 'linkFace', 'linkTwitter', 'linkGoogle', 'linkInstagram'], 'string', 'max' => 100],
            [['tipo'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 255],
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
            'idMaestro' => 'Id Maestro',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
            'imagen' => 'Imagen',
            'descripcion' => 'Descripcion',
            'linkFace' => 'Link Face',
            'linkTwitter' => 'Link Twitter',
            'linkGoogle' => 'Link Google',
            'linkInstagram' => 'Link Instagram',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEspecialidads()
    {
        return $this->hasMany(Especialidad::className(), ['Maestro_idMaestro' => 'idMaestro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
