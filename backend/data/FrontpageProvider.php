<?php
namespace backend\data;

use \common\models\Paginaimagenportada;

class FrontpageProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all all authors with their articles
	    $query = Paginaimagenportada::find();
		foreach($query->all() as $pro) {
			//Add rows with the Author, # of articles and last publishing date
			$this->allModels[] = [
				'IdImagenPortada' => $pro->idPaginaImagenPortada,
				'Descripcion' => $pro->descripcion,
				'Imagen' => $pro->imagen,
				'UserID' => $pro->user_id,
			];
		}
	}
}
?>