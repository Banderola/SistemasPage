<?php
namespace backend\data;

use \common\models\Noticia;

class NewsProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all all authors with their articles
	    $query = Noticia::find();
		foreach($query->all() as $noticia) {
			//Add rows with the Author, # of articles and last publishing date
			$this->allModels[] = [
				'Idnoticia' => $noticia->idnoticia,
				'Titulo' => $noticia->titulo,
                                'Descripcion' => $noticia->descripcion,
				'Imagen' => $noticia->imagen,
				'Visitas' => $noticia->visitas,
				'User_ID' => $noticia->user_id,
				'Link' => $noticia->link,
				'Fecha' => $noticia->fecha,
			];
		}
	}
}
?>