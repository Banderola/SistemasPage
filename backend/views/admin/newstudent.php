<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

$script = <<< JS
$(document).ready(function() {
    $("#studentform-foto").val('$model->foto');
});
JS;

$this->title=' Alumno';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'nombre') -> textInput();?>
    <?= $form->field($model, 'comentario') -> textarea(); ?>
	<?= $form->field($model, 'fechaComentario') -> widget(DatePicker::className(),[
		'dateFormat'=>'php:Y-m-d',
		'clientOptions' => ['defaultDate' => '+1']
	]);?>
    <?php echo $form->field($model, 'foto')->widget(\bilginnet\cropper\Cropper::className(), [
    'cropperOptions' => [
        'width' => 81, // must be specified
        'height' => 81, // must be specified
     ]
]);?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']); ?>
    </div>
<?php ActiveForm::end(); ?>
<?php
if($model->foto!=null){
    $this->registerJs($script);
}
?>