<?php

use yii\grid\GridView;
use backend\data\NewsProvider;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Bienvenido';
$dataProvider=new NewsProvider();
?>
<div class="site-index">

    <h1>Noticias</h1>

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
								return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['admin/modifynew' , 'id'=>$model['Idnoticia']], ['title' => 'Actualizar']);
							},
							'delete'=>function ($url, $model) {
								return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['admin/deletenew' , 'id'=>$model['Idnoticia']], ['title' => 'Eliminar','data-confirm' => '¿Desea eliminar el elemento '.$model['Idnoticia'].'?']);
							},
						],
					],
					'Titulo',
                                        'Descripcion',
					'Imagen',
					'Visitas',
					'Link',
					'Fecha',
				],
			]);
			?>
            <br>
            <?= Html::a('<p class="btn btn-default">Agregar Noticia</p>', ['admin/news']) ?>
            
        </div>

    </div>
</div>