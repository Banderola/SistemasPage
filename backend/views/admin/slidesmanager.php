<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\grid\GridView;
use backend\data\SlideProvider;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Bienvenido';
$dataProvider=new SlideProvider();
?>
<div class="site-index">

    <h1>Slides</h1>
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
								return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['admin/modifyslide' , 'id'=>$model['IdSlide']], ['title' => 'Actualizar']);
							},
							'delete'=>function ($url, $model) {
								return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['admin/deleteslide' , 'id'=>$model['IdSlide']], ['title' => 'Eliminar','data-confirm' => '¿Desea eliminar el elemento '.$model['IdSlide'].'?']);
							},
						],
					],
					'Titulo',
					'Imagen',
					'Descripcion',
				],
			]);
			?>
            <br>
            <?= Html::a('<p class="btn btn-default">Agregar Slide</p>', ['admin/slide']) ?>
            
        </div>

    </div>
</div>