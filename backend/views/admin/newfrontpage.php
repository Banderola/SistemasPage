<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    
$script = <<< JS
$(document).ready(function() {
    $("#frontpageform-imagen").val('$model->imagen');
});
JS;
    
    $this->title='Subir Imagen de portada';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'descripcion') -> textInput(); ?>
    <?php echo $form->field($model, 'imagen')->widget(\bilginnet\cropper\Cropper::className(), [
    'cropperOptions' => [
        'width' => 1920, // must be specified
        'height' => 322, // must be specified
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