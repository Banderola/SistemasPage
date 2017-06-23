<?php
	use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    
    $this->title='Subir Proyecto';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'titulo') -> textInput();?>
    <?= $form->field($model, 'descripcion') -> textInput(); ?>
    <?= $form->field($model, 'link') -> textInput(); ?>
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