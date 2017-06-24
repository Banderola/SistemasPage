<?php
namespace backend\data;

use \common\models\Evento;

class EventProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all all authors with their articles
	    $query = Evento::find();
		foreach($query->all() as $evento) {
			//Add rows with the Author, # of articles and last publishing date
			$this->allModels[] = [
				'IdEvento' => $evento->idevento,
				'Titulo' => $evento->titulo,
				'Imagen' => $evento->imagen,
				'Fecha' => $evento->fecha,
				'Lugar' =>$evento->lugar,
				'HoraInicio' =>$evento->hora_inicio,
				'HoraFin' =>$evento->hora_fin,
				'User_ID' => $evento->user_id,
			];
		}
	}
}
?>