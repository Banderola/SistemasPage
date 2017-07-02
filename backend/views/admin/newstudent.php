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
use yii\jui\DatePicker;
    
$this->title=' Alumno';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'nombre') -> textInput();?>
    <?= $form->field($model, 'comentario') -> textInput(); ?>
	<?= $form->field($model, 'fechaComentario') -> widget(DatePicker::className(),[
		'dateFormat'=>'php:Y-m-d',
		'clientOptions' => ['defaultDate' => '+1']
	]);?>
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