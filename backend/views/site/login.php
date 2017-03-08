<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Inicio de sesión';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    
            <?php $form = ActiveForm::begin(['id' => 'login-form','options' => ['class' => 'sign-box'],]) ?>
                    <div class="sign-avatar">
                        <?php echo Html::img('@web/img/avatar-sign.png') ?>
                    </div>
                    <header class="sign-title">Inicio Sesión</header>

                    <div class="form-group">
                        <?= $form->field($model, 'username')->textInput(['placeholder' => $model->getAttributeLabel('username'),'class' => 'form-control'])->label(false) ?>
                    </div>
                    <div class="form-group">
                        
                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password'),'class' => 'form-control'])->label(false) ?>
                    </div>
                    <div class="form-group">
                        <div class="checkbox float-left">
                            <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-1\">{input} {label}</div>",
        ]); ?>
                        </div>
                        <div class="float-right reset">
                            <?= Html::a('Reiniciar Contraseña', ['site/request-password-reset']) ?>
                        </div>
                    </div>

                <div class="form-group">
                    <?= Html::submitButton('Inicio de Sesión', ['class' => 'btn btn-rounded', 'name' => 'login-button']) ?>
                </div>
                

            <?php ActiveForm::end(); ?>
        
</div>
