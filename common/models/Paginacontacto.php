<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paginacontacto".
 *
 * @property integer $idPaginaContacto
 * @property string $telefono
 * @property string $correo
 * @property string $direccion
 * @property string $faceLink
 * @property string $rssLink
 * @property string $googleLink
 * @property string $pintLink
 * @property string $instagramLink
 * @property integer $user_id
 *
 * @property User $user
 */
class Paginacontacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paginacontacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['telefono', 'correo'], 'string', 'max' => 45],
            [['direccion', 'faceLink', 'rssLink', 'googleLink', 'pintLink', 'instagramLink'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPaginaContacto' => 'Id Pagina Contacto',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
            'direccion' => 'Direccion',
            'faceLink' => 'Face Link',
            'rssLink' => 'Rss Link',
            'googleLink' => 'Google Link',
            'pintLink' => 'Pint Link',
            'instagramLink' => 'Instagram Link',
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
