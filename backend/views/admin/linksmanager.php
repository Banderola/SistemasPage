<?php

use yii\grid\GridView;
use backend\data\LinkProvider;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Bienvenido';
$dataProvider=new LinkProvider();
?>
<div class="site-index">

    <h1>Página Enlaces</h1>

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
								return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['admin/modifylink' , 'id'=>$model['IdEnlaces']], ['title' => 'Actualizar']);
							},
							'delete'=>function ($url, $model) {
								return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['admin/deletelink' , 'id'=>$model['IdEnlaces']], ['title' => 'Eliminar','data-confirm' => '¿Desea eliminar el elemento '.$model['IdEnlaces'].'?']);
							},
						],
					],
					'Titulo',
					'Link',
				],
			]);
			?>
            <br>
            <?= Html::a('<p class="btn btn-default">Agregar Enlace</p>', ['admin/link']) ?>
            
        </div>

    </div>
</div>