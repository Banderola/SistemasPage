<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "maestro".
 *
 * @property integer $idMaestro
 * @property string $nombre
 * @property string $tipo
 * @property string $imagen
 * @property string $descripcion
 * @property string $linkFace
 * @property string $linkTwitter
 * @property string $linkGoogle
 * @property string $linkInstagram
 * @property integer $user_id
 *
 * @property User $user
 */
class Maestro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maestro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['nombre', 'imagen', 'linkFace', 'linkTwitter', 'linkGoogle', 'linkInstagram'], 'string', 'max' => 100],
            [['tipo'], 'string', 'max' => 45],
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
            'idMaestro' => 'Id Maestro',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
            'imagen' => 'Imagen',
            'descripcion' => 'Descripcion',
            'linkFace' => 'Link Face',
            'linkTwitter' => 'Link Twitter',
            'linkGoogle' => 'Link Google',
            'linkInstagram' => 'Link Instagram',
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
