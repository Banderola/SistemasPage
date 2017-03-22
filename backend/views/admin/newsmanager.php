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
					'Idnoticia',
					'Titulo',
					'Imagen',
					'Visitas',
					'User_ID',
					'Link',
					'Fecha',
					[
						//TODO: agregar boton con acción para  eliminar noticia en base a id
						'attribute' => 'Accion',
						'format' => 'raw',
						'value' => function ($model) {       
								return '<a class="btn btn-default">'.$model['Idnoticia'].'</a>';
						},
					],
				],
			]);
			?>
            <br>
            <?= Html::a('<p class="btn btn-default">Agregar Noticia</p>', ['admin/news']) ?>
            
        </div>

    </div>
</div>