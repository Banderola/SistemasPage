<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\grid\GridView;
use backend\data\ProjectCategoryProvider;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Bienvenido';
$dataProvider=new ProjectCategoryProvider();
?>
<div class="site-index">

    <h1>Projectos</h1>

    <div class="body-content">

        <div class="row">
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'columns' => [
					'idCategoriaProyecto',
					'Nombre',
					[
						//TODO: agregar boton con acción para  eliminar noticia en base a id
						'attribute' => 'Accion',
						'format' => 'raw',
						'value' => function ($model) {       
								return '<a class="btn btn-default">'.$model['idCategoriaProyecto'].'</a>';
						},
					],
				],
			]);
			?>
            <br>
            <?= Html::a('<p class="btn btn-default">Agregar Categoría</p>', ['admin/projectcategory']) ?>
            
        </div>

    </div>
</div>