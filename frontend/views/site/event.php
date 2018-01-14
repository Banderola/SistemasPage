<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\HtmlPurifier;

$this->title = 'Eventos';
?>
<div class="site-contact">
  
<!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area" style="background-image: url('<?=Yii::getAlias('@uploadUrl').'/'.$portada->imagen ?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h1 class="text-center">Eventos</h1>
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
                <!--Event Area Start-->
                <div class="event-area section-padding event-page">
                    <div class="container">
                        <div class="row">
                            
                            <?php foreach ($eventos as $evento): ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="single-event-item">
                                    <div class="single-event-image">
                                        <?= Html::a("<img src='".Yii::getAlias('@uploadUrl').'/'.Html::encode($evento->imagen)."' alt='' ><span>".(new \DateTime($evento->fecha))->format('d M')."</span>", ['site/eventdetail', 'id' => $evento->idevento]);?>
                                        
                                       
                                    </div>
                                    <div class="single-event-text">
                                        
                                        <h3><?= Html::a(Html::encode($evento->titulo), ['site/eventdetail', 'id' => $evento->idevento]);?></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-time"></i><?= (new \DateTime($evento->hora_inicio))->format('h.i a')?> - <?= (new \DateTime($evento->hora_fin))->format('h.i a')?></span>
                                           <span><i class="zmdi zmdi-pin"></i><?= Html::encode($evento->lugar)?></span>
                                       </div>
                                       <p><?= HtmlPurifier::process($evento->descripcion) ?></p>
                                       
                                       <?= Html::a("Leer", ['site/eventdetail', 'id' => $evento->idevento], ['class' => 'button-default']);?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination-content">
                                    <?= LinkPager::widget(['pagination' => $pagination]) ?>
<!--                                    <ul class="pagination">
                                        <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                        <li class="current"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                    </ul>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Event Area-->

</div>