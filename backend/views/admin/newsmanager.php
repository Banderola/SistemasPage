<?php

use yii\grid\GridView;
use backend\data\NewsProvider;

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
            <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Agregar noticia</a></p>
        </div>

    </div>
</div>