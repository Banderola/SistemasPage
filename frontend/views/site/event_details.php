<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$script = <<< JS
$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 2000);
});
JS;
$script2 = <<< JS
$(document).ready(function() {
    
    $("#alertButton2").click(function() {
    $('#alertA').show("slow");    
  });
    
});
JS;
 if (!Yii::$app->user->isGuest) {
     $this->registerJs($script);
 }
 else{
     $this->registerJs($script2);
     Yii::$app->user->setReturnUrl(Yii::$app->getRequest()->getUrl());
 }

$this->title = 'Evento';
$model->descripcion='';



?>
<div class="site-courses">
    
    <!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area" style="background-image: url('img/banner/<?= Html::encode($portada->imagen) ?>')">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h1 class="text-center">Evento</h1>
                                    <div class="breadcrumb-bar">
                                        <ul class="breadcrumb text-center">
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Breadcrumb Banner Area-->
                <!--Event Details Area Start-->
                <div class="event-details-area section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="event-details-content">
                                    <div class="single-event-item">
                                        <div class="single-event-image">
                                            <a href="#">
                                                <img alt="" src="img/event/<?= Html::encode($evento->imagen) ?>" height="801" width="285">
                                                <span><?= (new \DateTime($evento->fecha))->format('d M') ?></span>
                                            </a>
                                        </div>
                                        <div class="single-event-text">
                                            <h3><?= Html::encode($evento->titulo) ?></h3>
                                            <div class="single-item-comment-view">
                                               <span><i class="zmdi zmdi-time"></i><?= (new \DateTime($evento->hora_inicio))->format('h.i a') ?> - <?= (new \DateTime($evento->hora_fin))->format('h.i a') ?></span>
                                               <span><i class="zmdi zmdi-pin"></i><?= Html::encode($evento->lugar) ?></span>
                                           </div>
                                           <p><?= HtmlPurifier::process($evento->descripcion) ?></p>
                                        </div>
                                    </div>
                                    <div class="comments">
                                        <h4 class="title">Comentarios</h4>
                                        <div style="overflow-y:scroll; height:300px;">
                                        <?php Pjax::begin(); ?>
                                        <?= Html::a("", ['site/eventdetail', 'id' => $evento->idevento], ['id' => 'refreshButton']) ?>
                                        
                                        <?php foreach ($comentarios as $comentarioe): ?>
                                            
                                        <div class="single-comment">
                                            
                                            <div class="author-image">
                                                <img src="img/comment/<?= Html::encode($comentarioe->imagen) ?>" alt="">
                                            </div>
                                            <div class="comment-text">
                                                <div class="author-info">
                                                    <h4><a href="#"><?= Html::encode($comentarioe->nombre) ?></a></h4>
                                                    <span class="comment-time">Publicado el <?= Html::encode($comentarioe->fecha) ?> </span>
                                                </div>
                                                <p><?= Html::encode($comentarioe->descripcion) ?></p>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        <?php Pjax::end(); ?>
                                        </div>
                                        
                                        
                                         <!--Contact Form Area Start-->
                                        <div class="contact-form-area section-padding">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <h4 class="contact-title">Enviar un comentario</h4>
                                                        
                                                            <div class="row" >
                                                               
                                                                <div class="col-md-12">
                                                                <?php Pjax::begin(); ?>
                                                                <?php $formc = ActiveForm::begin(['options' => ['data-pjax' => '']]); ?>
                                                                    <?= $formc->field($model, 'descripcion')->textarea(['rows' => '10','cols' => '30'])->label(false); ?>
                                                                    <?= $formc->field($model, 'idEspecialidad')->hiddenInput(['value'=>$evento->idevento])->label(false); ?>
<!--                                                                    <textarea name="message" cols="30" rows="10" placeholder="Message"></textarea>
                                                                    <button type="submit" class="button-default">SUBMIT</button>-->
                                                                    <?php if (!Yii::$app->user->isGuest): ?>
                                                                    <?= Html::submitButton('Comentar', ['class' => 'button-default']) ?>
                                                                    <?php else: ?>
                                                                    <?= Html::button('Comentar', ['class' => 'button-default','id' => 'alertButton2']) ?>
                                                                    <?php endif ?>
                                                                <?php ActiveForm::end(); ?>
                                                                <?php Pjax::end(); ?>
                                                                </div>
                                                            </div>
                                                        <?= Html::tag('div', Html::a('Requiere Iniciar Sesion para Comentar', ['site/login'], ['class' => 'profile-link']), ['class' => 'alert alert-success','style'=>'display: none;','id' => 'alertA']) ?>
                                                        <p class="form-messege"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End of Contact Form-->
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-3">
                                <div class="sidebar-widget">
                                    <div class="single-sidebar-widget">
                                        <h4 class="title">Eventos Recientes</h4>
                                        <div class="recent-content">
                                            <?php foreach ($eventosals as $evento): ?>
                                            <div class="recent-content-item">
                                                
                                                <?= Html::a("<img src='img/event/".Html::encode($evento->imagen)."' alt='' height='67' width='67'>", ['site/eventdetail', 'id' => $evento->idevento]);?>
                                                <div class="recent-text">
                                                    <h4><?= Html::a(Html::encode($evento->titulo), ['site/eventdetail', 'id' => $evento->idevento]);?></h4>
                                                    <div class="single-item-comment-view">
                               
                                                        <span><i class="zmdi zmdi-comments"></i><?= Html::encode($evento->cnt) ?></span>
                                                    </div>
                                                    <p><?= HtmlPurifier::process($evento->descripcion) ?></p>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="single-sidebar-widget">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Event Details Area-->
    
    
</div>