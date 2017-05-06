<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "alumno".
 *
 * @property integer $idAlumno
 * @property string $nombre
 * @property integer $user_id
 * @property integer $ComentarioAlumno_idComentarioAlumno
 *
 * @property Comentarioalumno $comentarioAlumnoIdComentarioAlumno
 * @property User $user
 */
class Alumno extends \yii\db\ActiveRecord
{
    public $descripcion;
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
            [['idAlumno', 'user_id', 'ComentarioAlumno_idComentarioAlumno'], 'required'],
            [['idAlumno', 'user_id', 'ComentarioAlumno_idComentarioAlumno'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
            [['ComentarioAlumno_idComentarioAlumno'], 'exist', 'skipOnError' => true, 'targetClass' => Comentarioalumno::className(), 'targetAttribute' => ['ComentarioAlumno_idComentarioAlumno' => 'idComentarioAlumno']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAlumno' => 'Id Alumno',
            'nombre' => 'Nombre',
            'user_id' => 'User ID',
            'ComentarioAlumno_idComentarioAlumno' => 'Comentario Alumno Id Comentario Alumno',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarioAlumnoIdComentarioAlumno()
    {
        return $this->hasOne(Comentarioalumno::className(), ['idComentarioAlumno' => 'ComentarioAlumno_idComentarioAlumno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
