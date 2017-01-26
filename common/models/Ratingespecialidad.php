<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ratingespecialidad".
 *
 * @property integer $idRatingEspecialidad
 * @property integer $user_id
 * @property integer $Especialidad_idEspecialidades
 * @property double $Rating
 *
 * @property Especialidad $especialidadIdEspecialidades
 * @property User $user
 */
class Ratingespecialidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ratingespecialidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'Especialidad_idEspecialidades'], 'required'],
            [['user_id', 'Especialidad_idEspecialidades'], 'integer'],
            [['Rating'], 'number'],
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
            'idRatingEspecialidad' => 'Id Rating Especialidad',
            'user_id' => 'User ID',
            'Especialidad_idEspecialidades' => 'Especialidad Id Especialidades',
            'Rating' => 'Rating',
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
