<?php
namespace backend\data;

use \common\models\Especialidad;

class SpecialityProvider extends \yii\data\ArrayDataProvider
{
	/**
     * Initialize the dataprovider by filling allModels
     */
    public function init()
    {
        //Get all all authors with their articles
	    $query = Especialidad::find();
            $query->select('especialidad.*, Nombre AS especialidad, (SELECT nombre FROM maestro WHERE idMaestro=Maestro_idMaestro) AS maestro')
                ->leftJoin('categoriaespecialidad','CategoriaEspecialidad_idCategoriaEspecialidad=idCategoriaEspecialidad')
                ->groupBy('idEspecialidades')
                ->with('categoriaEspecialidadIdCategoriaEspecialidad');
		foreach($query->all() as $esp) {
			//Add rows with the Author, # of articles and last publishing date
			$this->allModels[] = [
				'IdEspecialidades' => $esp->idEspecialidades,
				'Titulo' => $esp->Titulo,
				'Descripcion' => $esp->Descripcion,
				'Visitas' => $esp->Visitas,
				'UserID' => $esp->user_id,
				'Especialidad' => $esp->especialidad,
				'Imagen' => $esp->imagen,
				'Maestro' => $esp->maestro
			];
		}
	}
}
?>