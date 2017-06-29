<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comentarioalumno".
 *
 * @property integer $ComentarioAlumno_idComentarioAlumno
 * @property string $Descripcion
 * @property string $Fecha
 *
 * @property Alumno[] $alumnos
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
            [['Descripcion', 'Fecha'], 'required'],
            [['Fecha'], 'safe'],
            [['Descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ComentarioAlumno_idComentarioAlumno' => 'IdComentarioAlumno',
            'Descripcion' => 'Descripcion',
            'Fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumno::className(), ['ComentarioAlumno_idComentarioAlumno' => 'idComentarioAlumno']);
    }
}
