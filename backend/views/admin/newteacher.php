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
use common\models\Maestro;
    
$this->title='Maestro';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'nombre') -> textInput();?>
    <?= $form->field($model, 'descripcion') -> textInput(); ?>
	<?= $form->field($model, 'f') -> textInput()->label('Link Facebook'); ?>
	<?= $form->field($model, 't') -> textInput()->label('Link Twitter'); ?>
	<?= $form->field($model, 'g') -> textInput()->label('Link Google+'); ?>
	<?= $form->field($model, 'i') -> textInput()->label('Link Instagram'); ?>
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