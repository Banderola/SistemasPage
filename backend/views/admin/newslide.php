<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    
$script = <<< JS
$(document).ready(function() {
    $("#slideform-imagen").val('$model->imagen');
});
JS;
    
    $this->title='Subir Slide';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'titulo') -> textInput();?>
    <?= $form->field($model, 'descripcion') -> textarea(); ?>
    <?php echo $form->field($model, 'imagen')->widget(\bilginnet\cropper\Cropper::className(), [
    'cropperOptions' => [
        'width' => 1596, // must be specified
        'height' => 716, // must be specified
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