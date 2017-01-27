<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipoespecialidad".
 *
 * @property integer $idTipoEspecialidad
 * @property string $Nombre
 *
 * @property Especialidad[] $especialidads
 */
class Tipoespecialidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipoespecialidad';
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
            'idTipoEspecialidad' => 'Id Tipo Especialidad',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEspecialidads()
    {
        return $this->hasMany(Especialidad::className(), ['TipoEspecialidad_idTipoEspecialidad' => 'idTipoEspecialidad']);
    }
}
