<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comentarionoticia".
 *
 * @property integer $idcomentarioNoticia
 * @property integer $noticia_idnoticia
 * @property integer $user_id
 *
 * @property User $user
 * @property Noticia $noticiaIdnoticia
 */
class Comentarionoticia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentarionoticia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['noticia_idnoticia', 'user_id'], 'required'],
            [['noticia_idnoticia', 'user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['noticia_idnoticia'], 'exist', 'skipOnError' => true, 'targetClass' => Noticia::className(), 'targetAttribute' => ['noticia_idnoticia' => 'idnoticia']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcomentarioNoticia' => 'Idcomentario Noticia',
            'noticia_idnoticia' => 'Noticia Idnoticia',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticiaIdnoticia()
    {
        return $this->hasOne(Noticia::className(), ['idnoticia' => 'noticia_idnoticia']);
    }
}
