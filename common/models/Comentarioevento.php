<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comentarioevento".
 *
 * @property integer $idComentarioEvento
 * @property string $descripcion
 * @property string $fecha
 * @property integer $evento_idevento
 * @property integer $user_id
 *
 * @property Evento $eventoIdevento
 * @property User $user
 */
class Comentarioevento extends \yii\db\ActiveRecord
{
    public $nombre;
    public $imagen;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentarioevento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'fecha', 'evento_idevento', 'user_id'], 'required'],
            [['fecha'], 'safe'],
            [['evento_idevento', 'user_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 255],
            [['evento_idevento'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_idevento' => 'idevento']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idComentarioEvento' => 'Id Comentario Evento',
            'descripcion' => 'Descripcion',
            'fecha' => 'Fecha',
            'evento_idevento' => 'Evento Idevento',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoIdevento()
    {
        return $this->hasOne(Evento::className(), ['idevento' => 'evento_idevento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
