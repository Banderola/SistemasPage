<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comentarioproyecto".
 *
 * @property integer $idComentarioProyecto
 * @property string $Descripcion
 * @property string $Fecha
 * @property integer $Proyecto_idProyecto
 * @property integer $user_id
 *
 * @property Proyecto $proyectoIdProyecto
 * @property User $user
 */
class Comentarioproyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentarioproyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha'], 'safe'],
            [['Proyecto_idProyecto', 'user_id'], 'required'],
            [['Proyecto_idProyecto', 'user_id'], 'integer'],
            [['Descripcion'], 'string', 'max' => 255],
            [['Proyecto_idProyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Proyecto::className(), 'targetAttribute' => ['Proyecto_idProyecto' => 'idProyecto']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idComentarioProyecto' => 'Id Comentario Proyecto',
            'Descripcion' => 'Descripcion',
            'Fecha' => 'Fecha',
            'Proyecto_idProyecto' => 'Proyecto Id Proyecto',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectoIdProyecto()
    {
        return $this->hasOne(Proyecto::className(), ['idProyecto' => 'Proyecto_idProyecto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
