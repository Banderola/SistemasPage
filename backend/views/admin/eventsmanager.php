<?php

use yii\grid\GridView;
use backend\data\EventProvider;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Bienvenido';
$dataProvider=new EventProvider();
?>
<div class="site-index">

    <h1>Eventos</h1>

    <div class="body-content">

        <div class="row">
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'columns' => [
					'IdEvento',
					'Titulo',
					'Imagen',
					'Fecha',
					'Lugar',
					'HoraInicio',
					'HoraFin',
					'User_ID',
					[
						//TODO: agregar boton con acción para  eliminar noticia en base a id
						'attribute' => 'Accion',
						'format' => 'raw',
						'value' => function ($model) {       
								return '<a class="btn btn-default">'.$model['IdEvento'].'</a>';
						},
					],
				],
			]);
			?>
            <br>
            <?= Html::a('<p class="btn btn-default">Agregar Evento</p>', ['admin/event']) ?>
            
        </div>

    </div>
</div>