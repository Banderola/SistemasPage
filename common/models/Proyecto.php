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
 * @property User $user
 * @property Ratingproyecto[] $ratingproyectos
 */
class Proyecto extends \yii\db\ActiveRecord
{
    public $rating;
    public $nombre;
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
            'idProyecto' => 'IdProyecto',
            'Titulo' => 'Titulo',
            'Descripcion' => 'Descripcion',
            'Url' => 'Url',
            'Imagen' => 'Imagen',
            'user_id' => 'UserID',
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
    public function getCategoriaProyectoIdcategoriaProyecto()
    {
        return $this->hasOne(Categoriaproyecto::className(), ['idcategoriaProyecto' => 'categoriaProyecto_idcategoriaProyecto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRatingproyectos()
    {
        return $this->hasMany(Ratingproyecto::className(), ['Proyecto_idProyecto' => 'idProyecto']);
    }
    
    public function getCountrating()
    {
        if(Yii::$app->user->isGuest){
            return $this->hasOne(Ratingproyecto::className(), ['Proyecto_idProyecto' => 'idProyecto'])
                ->select('AVG(Rating) AS cnt')
                ->where('user_id=0');
        }
        else{
            return $this->hasOne(Ratingproyecto::className(), ['Proyecto_idProyecto' => 'idProyecto'])
                ->select('AVG(Rating) AS cnt')
                ->where('user_id='.Yii::$app->user->getId());
            
        }
        
                
    }
}
