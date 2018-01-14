<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    $script = <<< JS
$(document).ready(function() {
    $("#newsform-imagen").val('$model->imagen');
});
JS;
    $this->title='Subir Noticia';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'titulo') -> textInput();?>
    <?= $form->field($model, 'descripcion') ->textarea(); ?>
    <?= $form->field($model, 'link') -> textInput(); ?>
    <?php echo $form->field($model, 'imagen')->widget(\bilginnet\cropper\Cropper::className(), [
    'cropperOptions' => [
        'width' => 870, // must be specified
        'height' => 439, // must be specified
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