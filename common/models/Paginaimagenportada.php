<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paginaimagenportada".
 *
 * @property integer $idPaginaImagenPortada
 * @property string $imagen
 * @property string $descripcion
 * @property integer $user_id
 *
 * @property User $user
 */
class Paginaimagenportada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paginaimagenportada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imagen', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['imagen'], 'string', 'max' => 100],
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
            'idPaginaImagenPortada' => 'Id Pagina Imagen Portada',
            'imagen' => 'Imagen',
            'descripcion' => 'Descripcion',
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
