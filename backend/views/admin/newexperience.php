<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    
    $this->title='Subir Experiencia';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'descripcion') -> textInput(); ?>
	<?= $form->field($model, 'valor') -> textInput();?>
	<?= $form->field($model, 'orientacion') -> checkbox();?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']); ?>
    </div>
<?php ActiveForm::end(); ?>