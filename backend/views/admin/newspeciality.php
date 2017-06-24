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
    
    $this->title='Subir Especialidad';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'titulo') -> textInput();?>
    <?= $form->field($model, 'descripcion') -> textInput(); ?>
    <?= $form->field($model, 'categoria') -> dropDownList(
		ArrayHelper::map(Categoriaespecialidad::find()->all(),'idCategoriaEspecialidad','Nombre'),
		['prompt' => 'Selecciona categoría']
	); ?>
	<?= $form->field($model, 'maestro_id') -> dropDownList(
		ArrayHelper::map(Maestro::find()->all(),'idMaestro','nombre'),
		['prompt' => 'Selecciona maestro']
	); ?>
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