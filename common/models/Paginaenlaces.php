<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paginaenlaces".
 *
 * @property integer $idEnlaces
 * @property string $titulo
 * @property string $link
 * @property integer $user_id
 *
 * @property User $user
 */
class Paginaenlaces extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paginaenlaces';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['titulo'], 'string', 'max' => 45],
            [['link'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEnlaces' => 'Id Enlaces',
            'titulo' => 'Titulo',
            'link' => 'Link',
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
