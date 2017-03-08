<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use budyaga\cropper\Widget;
    use yii\helpers\Url;
    
    $this->title='Subir Noticia';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'titulo') -> textInput();?>
    <?= $form->field($model, 'descripcion') -> textInput(); ?>
    <?= $form->field($model, 'link') -> textInput(); ?>
    <?= $form->field($model, 'imagen')->widget(Widget::className(), [
        //TODO: encontrar la forma de que nunca se repitan los nombres de las imágenes
        'uploadUrl' => Url::toRoute('/site/uploadPhoto'),
        'width' => 236,
        'height' => 234,
        'cropAreaWidth' => 500,
        'cropAreaHeight' => 500,
        'thumbnailWidth' => 236,
        'thumbnailHeight' => 234,
        'label' => 'Arrastra una imagen, o has click aquí para subir una.'
        ]);?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']); ?>
    </div>
<?php ActiveForm::end(); ?>