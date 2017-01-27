<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categoriaespecialidad".
 *
 * @property integer $idCategoriaEspecialidad
 * @property string $Nombre
 *
 * @property Especialidad[] $especialidads
 */
class Categoriaespecialidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoriaespecialidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCategoriaEspecialidad' => 'Id Categoria Especialidad',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEspecialidads()
    {
        return $this->hasMany(Especialidad::className(), ['CategoriaEspecialidad_idCategoriaEspecialidad' => 'idCategoriaEspecialidad']);
    }
}
