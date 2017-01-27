<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "incisonosotros".
 *
 * @property integer $idIncisoNosotros
 * @property string $descripcion
 * @property integer $PaginaNosotros_idPaginaNosotros
 *
 * @property Paginanosotros $paginaNosotrosIdPaginaNosotros
 */
class Incisonosotros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'incisonosotros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idIncisoNosotros', 'descripcion', 'PaginaNosotros_idPaginaNosotros'], 'required'],
            [['idIncisoNosotros', 'PaginaNosotros_idPaginaNosotros'], 'integer'],
            [['descripcion'], 'string', 'max' => 100],
            [['PaginaNosotros_idPaginaNosotros'], 'exist', 'skipOnError' => true, 'targetClass' => Paginanosotros::className(), 'targetAttribute' => ['PaginaNosotros_idPaginaNosotros' => 'idPaginaNosotros']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idIncisoNosotros' => 'Id Inciso Nosotros',
            'descripcion' => 'Descripcion',
            'PaginaNosotros_idPaginaNosotros' => 'Pagina Nosotros Id Pagina Nosotros',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaginaNosotrosIdPaginaNosotros()
    {
        return $this->hasOne(Paginanosotros::className(), ['idPaginaNosotros' => 'PaginaNosotros_idPaginaNosotros']);
    }
}
