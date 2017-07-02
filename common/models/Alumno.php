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
			['fecha', 'safe'],
            [['nombre','descripcion','fecha'], 'string', 'max' => 255],
			[['foto'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
			[['fecha'], 'default', 'value' => date('Y-m-d')]
        ];
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
			'fecha' => 'Fecha'
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
