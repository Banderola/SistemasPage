<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\grid\GridView;
use common\models\Paginacontacto;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Bienvenido';
?>
<div class="site-index">

    <h1>Página Contacto</h1>

    <div class="body-content">
	
		<?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'telefono') -> textInput();?>
		<?= $form->field($model, 'correo') -> textInput(); ?>
		<?= $form->field($model, 'direccion') -> textarea(); ?>
		<?= $form->field($model, 'faceLink') -> textInput()->label('Link Facebook'); ?>
		<?= $form->field($model, 'rssLink') -> textInput()->label('Link RSS'); ?>
		<?= $form->field($model, 'googleLink') -> textInput()->label('Link Google+'); ?>
		<?= $form->field($model, 'pintLink') -> textInput()->label('Link Pinteres'); ?>
		<?= $form->field($model, 'instagramLink') -> textInput()->label('Link Instagram'); ?>
		<?= $form->field($model, 'paginaWeb') -> textInput()->label('Página web'); ?>
		<?= $form->field($model, 'PiePagina') -> textArea(['rows'=>6])->label('Pie de página'); ?>
		<div class="form-group">
			<?= Html::submitButton('Guardar cambios', ['class' => 'btn btn-primary']); ?>
		</div>
<?php ActiveForm::end(); ?>

    </div>
</div>