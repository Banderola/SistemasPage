<?php
namespace backend\data;

use \common\models\Experiencia;

class ExperienceProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all all authors with their articles
	    $query = Experiencia::find();
		foreach($query->all() as $pro) {
			//Add rows with the Author, # of articles and last publishing date
			$this->allModels[] = [
				'IdExperiencia' => $pro->idExperiencia,
				'Descripcion' => $pro->descripcion,
				'Valor' => $pro->valor,
				'Orientacion' => $pro->orientacion,
				'UserID' => $pro->user_id,
			];
		}
	}
}
?>