<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "experiencia".
 *
 * @property integer $idExperiencia
 * @property string $descripcion
 * @property integer $valor
 * @property integer $user_id
 *
 * @property User $user
 */
class Experiencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'experiencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'user_id'], 'required'],
            [['valor', 'user_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idExperiencia' => 'Id Experiencia',
            'descripcion' => 'Descripcion',
            'valor' => 'Valor',
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
