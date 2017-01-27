<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evento".
 *
 * @property integer $idevento
 * @property string $titulo
 * @property string $descripcion
 * @property string $imagen
 * @property string $fecha
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $lugar
 * @property integer $user_id
 *
 * @property User $user
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'hora_inicio', 'hora_fin'], 'safe'],
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['titulo', 'imagen', 'lugar'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idevento' => 'Idevento',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
            'fecha' => 'Fecha',
            'hora_inicio' => 'Hora Inicio',
            'hora_fin' => 'Hora Fin',
            'lugar' => 'Lugar',
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