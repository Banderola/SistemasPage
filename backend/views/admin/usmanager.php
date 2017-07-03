<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\grid\GridView;
use common\models\Paginacontacto;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Bienvenido';
?>
<div class="site-index">

    <h1>Página Nosotros</h1>

    <div class="body-content">
	
		<?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'descripcion') -> textInput();?>
		<?php echo $form->field($model, 'imagen')->widget(\bilginnet\cropper\Cropper::className(), [
    'cropperOptions' => [
        'width' => 236, // must be specified
        'height' => 234, // must be specified
     ]
]);?>
		<div class="form-group">
			<?= Html::submitButton('Guardar cambios', ['class' => 'btn btn-primary']); ?>
		</div>
<?php ActiveForm::end(); ?>

    </div>
</div>