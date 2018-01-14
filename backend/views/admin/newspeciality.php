<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
	use yii\helpers\ArrayHelper;
	use common\models\Categoriaespecialidad;
	use common\models\Maestro;
        
$script = <<< JS
$(document).ready(function() {
    $("#specialityform-imagen").val('$model->imagen');
});
JS;
    
    $this->title='Subir Especialidad';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'titulo') -> textInput();?>
    <?= $form->field($model, 'descripcion') -> textarea(); ?>
    <?= $form->field($model, 'categoria') -> dropDownList(
		ArrayHelper::map(Categoriaespecialidad::find()->all(),'idCategoriaEspecialidad','Nombre'),
		['prompt' => 'Selecciona categoría']
	); ?>
	<?= $form->field($model, 'maestro_id') -> dropDownList(
		ArrayHelper::map(Maestro::find()->all(),'idMaestro','nombre'),
		['prompt' => 'Selecciona maestro']
	); ?>
    <?php echo $form->field($model, 'imagen')->widget(\bilginnet\cropper\Cropper::className(), [
    'cropperOptions' => [
        'width' => 410, // must be specified
        'height' => 376, // must be specified
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