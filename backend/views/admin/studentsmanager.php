<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\grid\GridView;
use backend\data\StudentProvider;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Bienvenido';
$dataProvider=new StudentProvider();
?>
<div class="site-index">

    <h1>Alumnos</h1>
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
								return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['admin/modifystudent' , 'id'=>$model['IdAlumno']], ['title' => 'Actualizar']);
							},
							'delete'=>function ($url, $model) {
								return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['admin/deletestudent' , 'id'=>$model['IdAlumno']], ['title' => 'Eliminar','data-confirm' => '¿Desea eliminar el elemento '.$model['IdAlumno'].'?']);
							},
						],
					],
					'IdAlumno',
					'Nombre',
					'Foto',
					'UserID',
					'Descripcion',
					'Fecha',
				],
			]);
			?>
            <br>
            <?= Html::a('<p class="btn btn-default">Agregar Alumno</p>', ['admin/student']) ?>
            
        </div>

    </div>
</div>