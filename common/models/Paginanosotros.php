<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paginanosotros".
 *
 * @property integer $idPaginaNosotros
 * @property string $descripcion
 * @property string $imagen
 * @property integer $user_id
 * @property string $titulo
 * @property string $descripcion2
 *
 * @property Incisonosotros[] $incisonosotros
 * @property User $user
 */
class Paginanosotros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paginanosotros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imagen', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['descripcion', 'descripcion2'], 'string', 'max' => 800],
            [['imagen'], 'string', 'max' => 100],
            [['titulo'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPaginaNosotros' => 'Id Pagina Nosotros',
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
            'user_id' => 'User ID',
            'titulo' => 'Titulo',
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
