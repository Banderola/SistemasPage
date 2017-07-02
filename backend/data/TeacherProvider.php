<?php
namespace backend\data;

use \common\models\Maestro;
use yii\bootstrap\Alert;

class TeacherProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all all authors with their articles
	    $query = Maestro::find();
		foreach($query->all() as $pro) {
			//Add rows with the Author, # of articles and last publishing date
			$this->allModels[] = [
				'IdMaestro' => $pro->idMaestro,
				'Nombre' => $pro->nombre,
				'Foto' => $pro->imagen,
				'UserID' => $pro->user_id,
				'Descripcion' => $pro->descripcion,
				'Facebook' => $pro->linkFace,
				'Twitter' => $pro->linkTwitter,
				'Google+' => $pro->linkGoogle,
				'Instagram' => $pro->linkInstagram,
			];
		}
	}
}
?>