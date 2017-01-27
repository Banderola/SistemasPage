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
            [['tituloPortada', 'descripcionPortada', 'cantidadAlumnos', 'cantidadPremios', 'imagenAlumnos', 'user_id'], 'required'],
            [['cantidadAlumnos', 'cantidadPremios', 'user_id'], 'integer'],
            [['tituloPortada', 'imagenAlumnos'], 'string', 'max' => 100],
            [['descripcionPortada'], 'string', 'max' => 500],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
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
