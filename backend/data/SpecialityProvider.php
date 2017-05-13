<?php
namespace backend\data;

use \common\models\Especialidad;

class NewsProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all all authors with their articles
	    $query = Especialidad::find();
		foreach($query->all() as $esp) {
			//Add rows with the Author, # of articles and last publishing date
			$this->allModels[] = [
				'IdEspecialidades' => $esp->idEspecialidades,
				'Titulo' => $esp->Titulo,
				'Descripcion' => $esp->Descripcion,
				'Visitas' => $esp->Visitas,
				'UserID' => $esp->user_id,
				'CategoriaEspecialidadIdCategoriaEspecialidad' => $esp->CategoriaEspecialidad_idCategoriaEspecialidad,
				'Imagen' => $esp->Imagen,
				'MaestroIdMaestro' => $esp->Maestro_idMaestro
			];
		}
	}
}
?>