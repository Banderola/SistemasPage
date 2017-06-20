<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\grid\GridView;
use backend\data\SpecialityProvider;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Bienvenido';
$dataProvider=new SpecialityProvider();
?>
<div class="site-index">

    <h1>Especialidades</h1>

    <div class="body-content">

        <div class="row">
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'columns' => [
					'IdEspecialidades',
					'Titulo',
					'Imagen',
					'Visitas',
					'UserID',
					'CategoriaEspecialidad',
					'MaestroId',
					[
						//TODO: agregar boton con acción para  eliminar noticia en base a id
						'attribute' => 'Accion',
						'format' => 'raw',
						'value' => function ($model) {       
								return '<a class="btn btn-default">'.$model['IdEspecialidades'].'</a>';
						},
					],
				],
			]);
			?>
            <br>
            <?= Html::a('<p class="btn btn-default">Agregar Especialidad</p>', ['admin/speciality']) ?>
            
        </div>

    </div>
</div>