<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use budyaga\cropper\Widget;

$this->title = 'Registro';
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor, rellene los siguientes campos para registrarse:</p>

    <div class="row">
        <div class="col-lg-5">
            <div class="col-izq">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
                
                <?= $form->field($model, 'nombre')->textInput(['autofocus' => true]) ?>
                
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
                
            
            
                <?= $form->field($model, 'photo')->widget(Widget::className(), [
                    'uploadUrl' => Url::toRoute('/site/uploadPhoto'),
                        ]) ?>
            
            <div class="form-send">
                    <?= Html::submitButton('Registrar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
