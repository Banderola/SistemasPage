<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <fieldset>
        <legend>Alumno</legend>
        <?= $form->field($model->alumno, 'nombre')->textInput() ?>
		<?php echo $form->field($model->alumno, 'foto')->widget(\bilginnet\cropper\Cropper::className(), [
    'cropperOptions' => [
        'width' => 236, // must be specified
        'height' => 234, // must be specified
     ]
]);?>
    </fieldset>

    <fieldset>
        <legend>Comentario</legend>
        <?= $form->field($model->comentario, 'descripcion')->textInput() ?>
    </fieldset>

    <?= Html::submitButton('Save'); ?>
    <?php ActiveForm::end(); ?>

</div>