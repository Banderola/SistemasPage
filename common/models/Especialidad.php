<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "especialidad".
 *
 * @property integer $idEspecialidades
 * @property string $Titulo
 * @property string $Descripcion
 * @property integer $Visitas
 * @property integer $Comentarios
 * @property integer $user_id
 * @property integer $CategoriaEspecialidad_idCategoriaEspecialidad
 * @property integer $TipoEspecialidad_idTipoEspecialidad
 *
 * @property Comentarioespecialidad[] $comentarioespecialidads
 * @property Categoriaespecialidad $categoriaEspecialidadIdCategoriaEspecialidad
 * @property Tipoespecialidad $tipoEspecialidadIdTipoEspecialidad
 * @property User $user
 * @property Ratingespecialidad[] $ratingespecialidads
 */
class Especialidad extends \yii\db\ActiveRecord
{
    public $cnt;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'especialidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Visitas', 'Comentarios', 'user_id', 'CategoriaEspecialidad_idCategoriaEspecialidad', 'TipoEspecialidad_idTipoEspecialidad'], 'integer'],
            [['user_id', 'CategoriaEspecialidad_idCategoriaEspecialidad', 'TipoEspecialidad_idTipoEspecialidad'], 'required'],
            [['Titulo'], 'string', 'max' => 45],
            [['Descripcion'], 'string', 'max' => 255],
            [['CategoriaEspecialidad_idCategoriaEspecialidad'], 'exist', 'skipOnError' => true, 'targetClass' => Categoriaespecialidad::className(), 'targetAttribute' => ['CategoriaEspecialidad_idCategoriaEspecialidad' => 'idCategoriaEspecialidad']],
            [['TipoEspecialidad_idTipoEspecialidad'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoespecialidad::className(), 'targetAttribute' => ['TipoEspecialidad_idTipoEspecialidad' => 'idTipoEspecialidad']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEspecialidades' => 'Id Especialidades',
            'Titulo' => 'Titulo',
            'Descripcion' => 'Descripcion',
            'Visitas' => 'Visitas',
            'Comentarios' => 'Comentarios',
            'user_id' => 'User ID',
            'CategoriaEspecialidad_idCategoriaEspecialidad' => 'Categoria Especialidad Id Categoria Especialidad',
            'TipoEspecialidad_idTipoEspecialidad' => 'Tipo Especialidad Id Tipo Especialidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarioespecialidads()
    {
        return $this->hasMany(Comentarioespecialidad::className(), ['Especialidad_idEspecialidades' => 'idEspecialidades']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriaEspecialidadIdCategoriaEspecialidad()
    {
        return $this->hasOne(Categoriaespecialidad::className(), ['idCategoriaEspecialidad' => 'CategoriaEspecialidad_idCategoriaEspecialidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoEspecialidadIdTipoEspecialidad()
    {
        return $this->hasOne(Tipoespecialidad::className(), ['idTipoEspecialidad' => 'TipoEspecialidad_idTipoEspecialidad']);
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
    public function getRatingespecialidads()
    {
        return $this->hasMany(Ratingespecialidad::className(), ['Especialidad_idEspecialidades' => 'idEspecialidades']);
    }
}
