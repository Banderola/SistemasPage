<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "noticia".
 *
 * @property integer $idnoticia
 * @property string $titulo
 * @property string $descripcion
 * @property string $imagen
 * @property integer $visitas
 * @property integer $user_id
 * @property string $link
 *
 * @property Comentarionoticia[] $comentarionoticias
 * @property User $user
 */
class Noticia extends \yii\db\ActiveRecord
{
    public $cnt;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noticia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visitas', 'user_id'], 'integer'],
            [['user_id'], 'required'],
            [['titulo', 'imagen'], 'string', 'max' => 45],
            [['descripcion', 'link'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idnoticia' => 'Idnoticia',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
            'visitas' => 'Visitas',
            'user_id' => 'User_ID',
            'link' => 'Link',
			'fecha' => 'Fecha'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarionoticias()
    {
        return $this->hasMany(Comentarionoticia::className(), ['noticia_idnoticia' => 'idnoticia'])
                ->select('comentarionoticia.*, nombre, imagen')
                ->leftJoin('user','comentarionoticia.user_id=user.id')
                ->groupBy('idcomentarioNoticia')
                ->with('user')
                ->orderBy('Fecha DESC');
    }
    
    public function getCuentacomentario()
    {
        return $this->hasMany(Comentarionoticia::className(), ['noticia_idnoticia' => 'idnoticia'])
                ->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
	
}
