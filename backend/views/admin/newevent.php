<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\jui\DatePicker;
    
$script = <<< JS
$(document).ready(function() {
    $("#eventform-imagen").val('$model->imagen');
});
JS;
    
    $this->title='Subir Evento';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'titulo') -> textInput();?>
    <?= $form->field($model, 'descripcion') -> textarea(); ?>
	<?= $form->field($model, 'lugar') ->textInput(); ?>
	<?= $form->field($model, 'fecha') -> widget(DatePicker::className(),[
		'dateFormat'=>'php:Y-m-d',
		'clientOptions' => ['defaultDate' => '+1']
	]);?>
	<?= $form->field($model, 'horai') ->textInput()->label('Hora de inicio (i.e. 1430 = 2:30pm'); ?>
	<?= $form->field($model, 'horaf') ->textInput()->label('Hora de finalización'); ?>
    <?php echo $form->field($model, 'imagen')->widget(\bilginnet\cropper\Cropper::className(), [
    'cropperOptions' => [
        'width' => 801, // must be specified
        'height' => 285, // must be specified
     ]
]);?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']); ?>
    </div>
<?php ActiveForm::end(); ?>
<?php
if($model->imagen!=null){
    $this->registerJs($script);
}
?>