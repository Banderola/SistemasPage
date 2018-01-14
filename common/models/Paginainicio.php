<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paginainicio".
 *
 * @property integer $idPaginaInicio
 * @property string $tituloPortada
 * @property string $descripcionPortada
 * @property integer $cantidadAlumnos
 * @property integer $cantidadPremios
 * @property string $imagenAlumnos
 * @property integer $user_id
 *
 * @property User $user
 */
class Paginainicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paginainicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tituloPortada', 'descripcionPortada', 'cantidadAlumnos', 'cantidadPremios', 'user_id'], 'required'],
            [['cantidadAlumnos', 'cantidadPremios', 'user_id'], 'integer'],
            [['tituloPortada'], 'string', 'max' => 100],
            [['descripcionPortada'], 'string', 'max' => 500],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['imagenAlumnos', 'imagenCifras'],'safe'],
        ];
    }
    
    public function beforeSave($insert)
    {
        if ((is_string($this->imagenAlumnos) && strstr($this->imagenAlumnos, 'data:image')) || (is_string($this->imagenCifras) && strstr($this->imagenCifras, 'data:image'))) {

            // creating image file as png
            $data1 = $this->imagenAlumnos;
            $data1 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data1));
            $data2 = $this->imagenCifras;
            $data2 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data2));
            $fileName1 = time() . '-' . rand(100000, 999999) . '.png';
            $fileName2 = time() . '-' . rand(100000, 999999) . '.png';
            file_put_contents(Yii::getAlias('@uploadPath') . '\\' . $fileName1, $data1);
            file_put_contents(Yii::getAlias('@uploadPath') . '\\' . $fileName2, $data2);
            // deleting old image 
            // $this->image is real attribute for filename in table
            // customize your code for your attribute            
           // if (!$this->isNewRecord && !empty($this->imagen)) {
              //  unlink(Yii::getAlias('@uploadPath'.'\\'.$this->imagen));
            //}
            
            // set new filename
            $this->imagenAlumnos = $fileName1;
            $this->imagenCifras = $fileName2;
        }

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPaginaInicio' => 'Id Pagina Inicio',
            'tituloPortada' => 'Titulo Portada',
            'descripcionPortada' => 'Descripcion Portada',
            'cantidadAlumnos' => 'Cantidad Alumnos',
            'cantidadPremios' => 'Cantidad Premios',
            'imagenAlumnos' => 'Imagen Alumnos',
            'imagenCifras' => 'Imagen Cifras',
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
