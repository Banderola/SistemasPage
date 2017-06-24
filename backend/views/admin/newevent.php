<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
	use yii\jui\DatePicker;
	use yii\jui\Spinner;
    
    $this->title='Subir Evento';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'titulo') -> textInput();?>
    <?= $form->field($model, 'descripcion') -> textInput(); ?>
	<?= $form->field($model, 'lugar') ->textInput(); ?>
	<?= $form->field($model, 'fecha') -> widget(DatePicker::className(),[
		'dateFormat'=>'php:Y-m-d',
		'clientOptions' => ['defaultDate' => '+1']
	]);?>
	<?= $form->field($model, 'horai') ->textInput()->label('Hora de inicio (i.e. 1430 = 2:30pm'); ?>
	<?= $form->field($model, 'horaf') ->textInput()->label('Hora de finalización'); ?>
    <?php echo $form->field($model, '_image')->widget(\bilginnet\cropper\Cropper::className(), [
    'cropperOptions' => [
        'width' => 236, // must be specified
        'height' => 234, // must be specified
     ]
]);?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']); ?>
    </div>
<?php ActiveForm::end(); ?>