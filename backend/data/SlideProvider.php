<?php
namespace backend\data;

use \common\models\Slide;

class SlideProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all all authors with their articles
	    $query = Slide::find();
		foreach($query->all() as $pro) {
			//Add rows with the Author, # of articles and last publishing date
			$this->allModels[] = [
				'IdSlide' => $pro->idSlide,
				'Titulo' => $pro->Titulo,
				'Descripcion' => $pro->Descripcion,
				'Imagen' => $pro->Imagen,
				'UserID' => $pro->user_id,
			];
		}
	}
}
?>