<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\captcha\Captcha;
use yii\widgets\LinkPager;
use yii\helpers\HtmlPurifier;

$this->title = 'Noticias';

?>
<div class="site-latestnews">
  
<!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area" style="background-image: url('<?=Yii::getAlias('@uploadUrl').'/'.Html::encode($portada->imagen) ?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h1 class="text-center">Noticias</h1>
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
                <!--Latest News Area Start--> 
                <div class="latest-area section-padding latest-page">
                    <div class="container">
                        <div class="row">
                           <?php foreach ($noticias as $noticia): ?> 
                            <div class="col-md-6">
                                <div class="single-latest-item">
                                    <div class="single-latest-image">
                                        
                                        <?= Html::a("<img src='".Yii::getAlias('@uploadUrl').'/'.Html::encode($noticia->imagen)."' alt='' style='max-width: 664px;'>", ['site/newsdetails', 'id' => $noticia->idnoticia]);?>
                                    </div>
                                    <div class="single-latest-text">
                                       
                                        <h3><?= Html::a(Html::encode($noticia->titulo), ['site/newsdetails', 'id' => $noticia->idnoticia]);?></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-calendar-check"></i><?=(new \DateTime($noticia->fecha))->format('d M Y')?></span>
                                           <span><i class="zmdi zmdi-eye"></i><?=Html::encode($noticia->visitas)?></span>
                                           <span><i class="zmdi zmdi-comments"></i><?=Html::encode($noticia->cnt)?></span>
                                       </div>
                                        <p><?= HtmlPurifier::process($noticia->descripcion) ?></p>
                               
                                       <?= Html::a("Leer", ['site/newsdetails', 'id' => $noticia->idnoticia], ['class' => 'button-default']);?>
                                    </div>
                                </div>
                                
                                
                            </div>
                            
                            <?php endforeach; ?>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination-content">
                                    <?= LinkPager::widget(['pagination' => $pagination]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Latest News Area-->

</div>