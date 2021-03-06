<?php
namespace backend\data;

use \common\models\Alumno;
use yii\bootstrap\Alert;

class StudentProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all all authors with their articles
	    $query = Alumno::find();
		foreach($query->all() as $pro) {
			//Add rows with the Author, # of articles and last publishing date
			$this->allModels[] = [
				'IdAlumno' => $pro->idAlumno,
				'Nombre' => $pro->nombre,
				'Foto' => $pro->foto,
				'UserID' => $pro->user_id,
				'Descripcion' => $pro->descripcion,
				'Fecha' => $pro->fecha
			];
		}
	}
}
?>