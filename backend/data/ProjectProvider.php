<?php
namespace backend\data;

use \common\models\Proyecto;

class ProjectProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all all authors with their articles
	    $query = Proyecto::find();
		foreach($query->all() as $pro) {
			//Add rows with the Author, # of articles and last publishing date
			$this->allModels[] = [
				'IdProyecto' => $pro->idProyecto,
				'Titulo' => $pro->Titulo,
				'Descripcion' => $pro->Descripcion,
				'Url' => $pro->Url,
				'Imagen' => $pro->Imagen,
				'UserID' => $pro->user_id,
				'Fecha' => $pro->Fecha,
				'CategoriaID' =>$pro->categoriaProyecto_idcategoriaProyecto
			];
		}
	}
}
?>