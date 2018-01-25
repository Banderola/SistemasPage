<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evento".
 *
 * @property integer $idevento
 * @property string $titulo
 * @property string $descripcion
 * @property string $imagen
 * @property string $fecha
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $lugar
 * @property integer $user_id
 *
 * @property Comentarioevento[] $comentarioeventos
 * @property User $user
 */
class Evento extends \yii\db\ActiveRecord
{
    public $cnt;
    public $imagenOld;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'hora_inicio', 'hora_fin'], 'safe'],
            [['user_id','imagen'], 'required'],
            [['user_id'], 'integer'],
            [['titulo', 'lugar'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['fecha'], 'default', 'value' => date('Y-m-d')],
            [['imagen'],'safe'],
        ];
    }
    
    public function beforeSave($insert)
    {
        if (is_string($this->imagen) && strstr($this->imagen, 'data:image')) {

            // creating image file as png
            $data = $this->imagen;
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
            $fileName = time() . '-' . rand(100000, 999999) . '.png';
            file_put_contents(Yii::getAlias('@uploadPath') . '\\' . $fileName, $data);
            // deleting old image 
            // $this->image is real attribute for filename in table
            // customize your code for your attribute            
            if (!$this->isNewRecord && !empty($this->imagenOld) && file_exists (Yii::getAlias('@uploadPath').'\\'.$this->imagenOld)) {
                unlink(Yii::getAlias('@uploadPath').'\\'.$this->imagenOld);
            }
            
            // set new filename
            $this->imagen = $fileName;
        }

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idevento' => 'Idevento',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
            'fecha' => 'Fecha',
            'hora_inicio' => 'Hora Inicio',
            'hora_fin' => 'Hora Fin',
            'lugar' => 'Lugar',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarioeventos()
    {
        return $this->hasMany(Comentarioevento::className(), ['evento_idevento' => 'idevento'])
                ->select('comentarioevento.*, nombre, imagen')
                ->leftJoin('user','comentarioevento.user_id=user.id')
                ->groupBy('idComentarioEvento')
                ->with('user')
                ->orderBy('Fecha DESC');
    }
    
    public function getCuentacomentario()
    {
        return $this->hasMany(Comentarioevento::className(), ['evento_idevento' => 'idevento'])
                ->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
