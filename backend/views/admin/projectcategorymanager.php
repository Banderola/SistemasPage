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

    <h1>Categorias de proyectos</h1>

    <div class="body-content">

        <div class="row">
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'columns' => [
					[
						//TODO: agregar boton con acción para  eliminar noticia en base a id
						'class' => yii\grid\ActionColumn::className(),
						'template' => '{update} {delete}',
						'buttons'=>[
							'update'=>function ($url, $model) {
								return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['admin/modifyprojectcategory' , 'id'=>$model['idCategoriaProyecto']], ['title' => 'Actualizar']);
							},
							'delete'=>function ($url, $model) {
								return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['admin/deleteprojectcategory' , 'id'=>$model['idCategoriaProyecto']], ['title' => 'Eliminar','data-confirm' => '¿Desea eliminar el elemento '.$model['idCategoriaProyecto'].'?']);
							},
						],
					],
					'idCategoriaProyecto',
					'Nombre',
				],
			]);
			?>
            <br>
            <?= Html::a('<p class="btn btn-default">Agregar Categoría</p>', ['admin/projectcategory']) ?>
            
        </div>

    </div>
</div>