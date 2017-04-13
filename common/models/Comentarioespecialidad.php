<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comentarioespecialidad".
 *
 * @property integer $idComentarioEspecialidad
 * @property string $Descripcion
 * @property string $Fecha
 * @property integer $Especialidad_idEspecialidades
 * @property integer $user_id
 *
 * @property Especialidad $especialidadIdEspecialidades
 * @property User $user
 */
class Comentarioespecialidad extends \yii\db\ActiveRecord
{
    public $nombre;
    public $imagen;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentarioespecialidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion', 'Fecha', 'Especialidad_idEspecialidades', 'user_id'], 'required'],
            [['Fecha'], 'safe'],
            [['Especialidad_idEspecialidades', 'user_id'], 'integer'],
            [['Descripcion'], 'string', 'max' => 255],
            [['Especialidad_idEspecialidades'], 'exist', 'skipOnError' => true, 'targetClass' => Especialidad::className(), 'targetAttribute' => ['Especialidad_idEspecialidades' => 'idEspecialidades']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idComentarioEspecialidad' => 'Id Comentario Especialidad',
            'Descripcion' => 'Descripcion',
            'Fecha' => 'Fecha',
            'Especialidad_idEspecialidades' => 'Especialidad Id Especialidades',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEspecialidadIdEspecialidades()
    {
        return $this->hasOne(Especialidad::className(), ['idEspecialidades' => 'Especialidad_idEspecialidades']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
