<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contacto".
 *
 * @property integer $idcontacto
 * @property string $nombre
 * @property string $email
 * @property integer $leido
 * @property integer $user_id
 * @property string $mensaje
 *
 * @property User $user
 */
class Contacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['leido', 'user_id'], 'integer'],
            [['user_id'], 'required'],
            [['nombre', 'email'], 'string', 'max' => 45],
            [['mensaje'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcontacto' => 'Idcontacto',
            'nombre' => 'Nombre',
            'email' => 'Email',
            'leido' => 'Leido',
            'user_id' => 'User ID',
            'mensaje' => 'Mensaje',
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
