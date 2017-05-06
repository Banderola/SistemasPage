<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comentarionoticia".
 *
 * @property integer $idcomentarioNoticia
 * @property integer $noticia_idnoticia
 * @property integer $user_id
 * @property string $descripcion
 * @property string $Fecha
 *
 * @property User $user
 * @property Noticia $noticiaIdnoticia
 */
class Comentarionoticia extends \yii\db\ActiveRecord
{
    public $nombre;
    public $imagen;
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
            [['noticia_idnoticia', 'user_id', 'descripcion', 'Fecha'], 'required'],
            [['noticia_idnoticia', 'user_id'], 'integer'],
            [['Fecha'], 'safe'],
            [['descripcion'], 'string', 'max' => 255],
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
            'descripcion' => 'Descripcion',
            'Fecha' => 'Fecha',
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
