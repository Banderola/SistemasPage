<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comentarioalumno".
 *
 * @property integer $idComentarioAlumno
 * @property string $Descripcion
 * @property integer $user_id
 * @property string $Fecha
 *
 * @property User $user
 */
class Comentarioalumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentarioalumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion', 'user_id', 'Fecha'], 'required'],
            [['user_id'], 'integer'],
            [['Fecha'], 'safe'],
            [['Descripcion'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idComentarioAlumno' => 'Id Comentario Alumno',
            'Descripcion' => 'Descripcion',
            'user_id' => 'User ID',
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
}
