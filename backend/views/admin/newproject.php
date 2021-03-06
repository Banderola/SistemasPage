<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use yii\helpers\ArrayHelper;
    use common\models\Categoriaproyecto;
    
$script = <<< JS
$(document).ready(function() {
    $("#projectform-imagen").val('$model->imagen');
});
JS;

   
    $this->title='Subir Proyecto';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'titulo') -> textInput();?>
    <?= $form->field($model, 'descripcion') -> textInput(); ?>
    <?= $form->field($model, 'link') -> textInput(); ?>
	<?= $form->field($model, 'categoria_id') -> dropDownList(
		ArrayHelper::map(Categoriaproyecto::find()->all(),'idcategoriaProyecto','Nombre'),
		['prompt' => 'Selecciona categoria']
	); ?>
    <?php echo $form->field($model, 'imagen')->widget(\bilginnet\cropper\Cropper::className(), [
    'cropperOptions' => [
        'width' => 236, // must be specified
        'height' => 234, // must be specified
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