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

    <div class="body-content">

        <div class="row">
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'columns' => [
					'IdAlumno',
					'Nombre',
					'Foto',
					'UserID',
					'Comentario',
					[
						//TODO: agregar boton con acción para  eliminar noticia en base a id
						'attribute' => 'Accion',
						'format' => 'raw',
						'value' => function ($model) {       
								return '<a class="btn btn-default">'.$model['IdAlumno'].'</a>';
						},
					],
				],
			]);
			?>
            <br>
            <?= Html::a('<p class="btn btn-default">Agregar Alumno</p>', ['admin/student']) ?>
            
        </div>

    </div>
</div>