<?php
namespace backend\data;

use \common\models\Categoriaproyecto;

class ProjectCategoryProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all all authors with their articles
	    $query = Categoriaproyecto::find();
		foreach($query->all() as $categoria) {
			//Add rows with the Author, # of articles and last publishing date
			$this->allModels[] = [
				'idCategoriaProyecto' => $categoria->idcategoriaProyecto,
				'Nombre' => $categoria->Nombre
			];
		}
	}
}
?>