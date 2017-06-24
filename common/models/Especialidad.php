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
 * @property integer $user_id
 * @property integer $CategoriaEspecialidad_idCategoriaEspecialidad
 * @property string $imagen
 * @property integer $Maestro_idMaestro
 *
 * @property Comentarioespecialidad[] $comentarioespecialidads
 * @property Categoriaespecialidad $categoriaEspecialidadIdCategoriaEspecialidad
 * @property Maestro $maestroIdMaestro
 * @property User $user
 * @property Ratingespecialidad[] $ratingespecialidads
 */
class Especialidad extends \yii\db\ActiveRecord
{
	const SCENARIO_ONE="one";
    public $cnt;
    public $rating;
    public $maestro;
	public $_image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'especialidad';
    }
	
	public function beforeSave($insert)
    {
        if (is_string($this->_image) && strstr($this->_image, 'data:image')) {

            // creating image file as png
            $data = $this->_image;
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
            $fileName = time() . '-' . rand(100000, 999999) . '.png';
            file_put_contents(Yii::getAlias('@uploadPath') . '\\' . $fileName, $data);
            // deleting old image 
            // $this->image is real attribute for filename in table
            // customize your code for your attribute            
            if (!$this->isNewRecord && !empty($this->imagen)) {
                unlink(Yii::getAlias('@uploadPath'.'\\'.$this->imagen));
            }
            
            // set new filename
            $this->imagen = $fileName;
        }

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Visitas', 'user_id', 'CategoriaEspecialidad_idCategoriaEspecialidad', 'Maestro_idMaestro'], 'integer'],
            [['user_id', 'CategoriaEspecialidad_idCategoriaEspecialidad', 'Maestro_idMaestro'], 'required'],
            [['Titulo', 'imagen'], 'string', 'max' => 45],
            [['Descripcion'], 'string', 'max' => 255],
            [['CategoriaEspecialidad_idCategoriaEspecialidad'], 'exist', 'skipOnError' => true, 'targetClass' => Categoriaespecialidad::className(), 'targetAttribute' => ['CategoriaEspecialidad_idCategoriaEspecialidad' => 'idCategoriaEspecialidad']],
            [['Maestro_idMaestro'], 'exist', 'skipOnError' => true, 'targetClass' => Maestro::className(), 'targetAttribute' => ['Maestro_idMaestro' => 'idMaestro']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
			[['_image','Maestro_idMaestro'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEspecialidades' => 'IdEspecialidades',
            'Titulo' => 'Titulo',
            'Descripcion' => 'Descripcion',
            'Visitas' => 'Visitas',
            'user_id' => 'UserID',
            'CategoriaEspecialidad_idCategoriaEspecialidad' => 'CategoriaEspecialidadIdCategoriaEspecialidad',
            'imagen' => 'Imagen',
            'Maestro_idMaestro' => 'MaestroIdMaestro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarioespecialidads()
    {
        return $this->hasMany(Comentarioespecialidad::className(), ['Especialidad_idEspecialidades' => 'idEspecialidades'])
                ->select('comentarioespecialidad.*, nombre, imagen')
                ->leftJoin('user','comentarioespecialidad.user_id=user.id')
                ->groupBy('idComentarioEspecialidad')
                ->with('user')
                ->orderBy('Fecha DESC');
                
    }
    
    public function getCuentacomentario()
    {
        return $this->hasMany(Comentarioespecialidad::className(), ['Especialidad_idEspecialidades' => 'idEspecialidades'])
                ->count();
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
    public function getMaestroIdMaestro()
    {
        return $this->hasOne(Maestro::className(), ['idMaestro' => 'Maestro_idMaestro']);
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
    
    public function getCountrating()
    {
        if(Yii::$app->user->isGuest){
            return $this->hasOne(Ratingespecialidad::className(), ['Especialidad_idEspecialidades' => 'idEspecialidades'])
                ->select('AVG(Rating) AS cnt')
                ->where('user_id=0');
        }
        else{
            return $this->hasOne(Ratingespecialidad::className(), ['Especialidad_idEspecialidades' => 'idEspecialidades'])
                ->select('AVG(Rating) AS cnt')
                ->where('user_id='.Yii::$app->user->getId());
            
        }
        
                
    }
}
