<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ratingproyecto".
 *
 * @property integer $idRatingProyecto
 * @property integer $user_id
 * @property integer $Proyecto_idProyecto
 * @property double $Rating
 *
 * @property Proyecto $proyectoIdProyecto
 * @property User $user
 */
class Ratingproyecto extends \yii\db\ActiveRecord
{
    public $cnt;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ratingproyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'Proyecto_idProyecto'], 'required'],
            [['user_id', 'Proyecto_idProyecto'], 'integer'],
            [['Rating'], 'number'],
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
            'idRatingProyecto' => 'Id Rating Proyecto',
            'user_id' => 'User ID',
            'Proyecto_idProyecto' => 'Proyecto Id Proyecto',
            'Rating' => 'Rating',
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
