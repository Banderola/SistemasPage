<?php
namespace backend\data;

use \common\models\Paginaenlaces;

class LinkProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all all authors with their articles
	    $query = Paginaenlaces::find();
		foreach($query->all() as $evento) {
			//Add rows with the Author, # of articles and last publishing date
			$this->allModels[] = [
				'IdEnlaces' => $evento->idEnlaces,
				'Titulo' => $evento->titulo,
				'Link' => $evento->link,
				'UserID' => $evento->user_id,
			];
		}
	}
}
?>