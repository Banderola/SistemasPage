<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$script = <<< JS
$(document).ready(function() {
    $("#indexform-imagenalumnos").val('$model->imagenAlumnos');
    $("#indexform-imagencifras").val('$model->imagenCifras');
});
JS;

$this->title = 'Bienvenido';
?>
<div class="site-index">

    <h1>Página Inicio</h1>

    <div class="body-content">
	
		<?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'tituloPortada') -> textInput();?>
		<?= $form->field($model, 'descripcionPortada') -> textarea(); ?>
		<?= $form->field($model, 'cantidadAlumnos') -> textInput(); ?>
		<?= $form->field($model, 'cantidadPremios') -> textInput(); ?>
		<?php echo $form->field($model, 'imagenAlumnos')->widget(\bilginnet\cropper\Cropper::className(), [
    'cropperOptions' => [
        'width' => 1920, // must be specified
        'height' => 480, // must be specified
     ]
]);?>
<?php echo $form->field($model, 'imagenCifras')->widget(\bilginnet\cropper\Cropper::className(), [
    'cropperOptions' => [
        'width' => 1600, // must be specified
        'height' => 481, // must be specified
     ]
]);?>
		
		<div class="form-group">
			<?= Html::submitButton('Guardar cambios', ['class' => 'btn btn-primary']); ?>
		</div>
<?php ActiveForm::end(); ?>
<?php
if($model->imagenAlumnos!=null && $model->imagenCifras!=null){
    $this->registerJs($script);
}
?>

    </div>
</div>