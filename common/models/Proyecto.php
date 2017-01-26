<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "proyecto".
 *
 * @property integer $idProyecto
 * @property string $Titulo
 * @property string $Descripcion
 * @property string $Url
 * @property string $Imagen
 * @property integer $user_id
 * @property string $Fecha
 *
 * @property Comentarioproyecto[] $comentarioproyectos
 * @property User $user
 * @property Ratingproyecto[] $ratingproyectos
 */
class Proyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'Fecha'], 'required'],
            [['user_id'], 'integer'],
            [['Fecha'], 'safe'],
            [['Titulo', 'Imagen'], 'string', 'max' => 45],
            [['Descripcion'], 'string', 'max' => 255],
            [['Url'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProyecto' => 'Id Proyecto',
            'Titulo' => 'Titulo',
            'Descripcion' => 'Descripcion',
            'Url' => 'Url',
            'Imagen' => 'Imagen',
            'user_id' => 'User ID',
            'Fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarioproyectos()
    {
        return $this->hasMany(Comentarioproyecto::className(), ['Proyecto_idProyecto' => 'idProyecto']);
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
    public function getRatingproyectos()
    {
        return $this->hasMany(Ratingproyecto::className(), ['Proyecto_idProyecto' => 'idProyecto']);
    }
}
