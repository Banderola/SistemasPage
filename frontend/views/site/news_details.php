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

$this->title = 'Noticia';
$model->descripcion='';



?>
<div class="site-courses">
    
    <!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area" style="background-image: url('img/banner/<?= Html::encode($portada->imagen) ?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h1 class="text-center">Noticia</h1>
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
                <!--News Details Area Start-->
                <div class="news-details-area section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <div class="news-details-content">
                                   <div class="single-latest-item">
                                        <img src="<?=Yii::getAlias('@uploadUrl').'/'.Html::encode($noticia->imagen) ?>" alt="">  
                                        <div class="single-latest-text">
                                            <h3><?= Html::encode($noticia->titulo) ?></h3> 
                                            <div class="single-item-comment-view">
                                               <span><i class="zmdi zmdi-calendar-check"></i><?= (new \DateTime($noticia->fecha))->format('d M Y') ?></span>
                                               <span><i class="zmdi zmdi-eye"></i><?= Html::encode($noticia->visitas) ?></span>
                                               <span><i class="zmdi zmdi-comments"></i><?= Html::encode($comentariocuenta) ?></span>
                                            </div>
                                            <?= HtmlPurifier::process($noticia->descripcion) ?>
                                            <div class="tags-and-links">
                                                <div class="related-tag">
                                                    
                                                </div>
                                                <div class="social-links">
                                                    <span>Share:</span>
                                                    <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comments">

                                        <h4 class="title">Comentarios</h4>
                                        <div style="overflow-y:scroll; height:300px;">
                                        <?php Pjax::begin(); ?>
                                        <?= Html::a("", ['site/newsdetails', 'id'=>$noticia->idnoticia], ['id' => 'refreshButton']) ?>
                                        
                                        <?php foreach ($comentarios as $comentarioe): ?>
                                            
                                        <div class="single-comment">
                                            
                                            <div class="author-image">
                                                <img src="<?= Html::encode($comentarioe->imagen) ?>" alt="">
                                            </div>
                                            <div class="comment-text">
                                                <div class="author-info">
                                                    <h4><a href="#"><?= Html::encode($comentarioe->nombre) ?></a></h4>
                                                    <span class="comment-time">Publicado el <?= Html::encode($comentarioe->Fecha) ?> </span>
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
                                                                    <?= $formc->field($model, 'idEspecialidad')->hiddenInput(['value'=>$noticia->idnoticia])->label(false); ?>
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
                            <div class="col-lg-3 col-md-4">
                                <div class="sidebar-widget">
                                    <div class="single-sidebar-widget">
                                        <h4 class="title">Recientes Noticias</h4>
                                        <div class="recent-content">
                                            <?php foreach ($noticiasals as $noticial): ?>
                                            <div class="recent-content-item">
                                               
                                                <?= Html::a("<img src='".Html::encode($noticial->imagen)."' alt='' height='67' width='67'>", ['site/newsdetails', 'id' => $noticial->idnoticia]);?>
                                                <div class="recent-text">
                                                    
                                                    <h4><?= Html::a(Html::encode($noticial->titulo), ['site/newsdetails', 'id' => $noticial->idnoticia]);?></h4>
                                                    <div class="single-item-comment-view">
                                                        <span><i class="zmdi zmdi-eye"></i><?= Html::encode($noticial->visitas) ?></span>
                                                        <span><i class="zmdi zmdi-comments"></i><?= Html::encode($noticial->cnt) ?></span>
                                                    </div>
                                                    <p><?= HtmlPurifier::process($noticial->descripcion) ?></p>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                            
                                        </div>
                                    </div>
                                    <div class="single-sidebar-widget comment">
                                        <h4 class="title">Recientes Comentarios</h4>
                                        <div class="recent-content">
                                            <?php foreach ($comentariosals as $comentario): ?>
                                            <div class="recent-content-item">
                                                <a href="#"><img src="<?= Html::encode($comentario->imagen) ?>" alt=""></a>
                                                <div class="recent-text">
                                                    <h4><a href="#"><?= Html::encode($comentario->nombre) ?></a></h4>
                                                    <p><?= HtmlPurifier::process($comentario->descripcion) ?></p>
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
                <!--End of News Details Area-->
    
    
</div>


