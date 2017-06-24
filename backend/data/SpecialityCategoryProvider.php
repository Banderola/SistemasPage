<?php
namespace backend\data;

use \common\models\Categoriaespecialidad;

class SpecialityCategoryProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all all authors with their articles
	    $query = Categoriaespecialidad::find();
		foreach($query->all() as $categoria) {
			//Add rows with the Author, # of articles and last publishing date
			$this->allModels[] = [
				'idCategoriaEspecialidad' => $categoria->idCategoriaEspecialidad,
				'Nombre' => $categoria->Nombre
			];
		}
	}
}
?>