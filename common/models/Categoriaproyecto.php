<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categoriaproyecto".
 *
 * @property integer $idcategoriaProyecto
 * @property string $Nombre
 *
 * @property Proyecto[] $proyectos
 */
class Categoriaproyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoriaproyecto';
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
            'idcategoriaProyecto' => 'Idcategoria',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectos()
    {
        return $this->hasMany(Proyecto::className(), ['categoriaProyecto_idcategoriaProyecto' => 'idcategoriaProyecto']);
    }
}
