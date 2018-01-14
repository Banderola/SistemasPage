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
					[
						//TODO: agregar boton con acción para  eliminar noticia en base a id
						'class' => yii\grid\ActionColumn::className(),
						'template' => '{update} {delete}',
						'buttons'=>[
							'update'=>function ($url, $model) {
								return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['admin/modifyevent' , 'id'=>$model['IdEvento']], ['title' => 'Actualizar']);
							},
							'delete'=>function ($url, $model) {
								return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['admin/deleteevent' , 'id'=>$model['IdEvento']], ['title' => 'Eliminar','data-confirm' => '¿Desea eliminar el elemento '.$model['IdEvento'].'?']);
							},
						],
					],
					'Titulo',
					'Descripcion',                                                                
					'Imagen',
					'Fecha',
					'Lugar',
					'HoraInicio',
					'HoraFin',
				],
			]);
			?>
            <br>
            <?= Html::a('<p class="btn btn-default">Agregar Evento</p>', ['admin/event']) ?>
            
        </div>

    </div>
</div>