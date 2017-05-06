<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\HtmlPurifier;

$this->title = 'Shopgrid';

?>
<div class="site-shopgrid">
    
<!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area" style="background-image: url('img/banner/<?= $portada->imagen ?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h1 class="text-center">ONLINE LIBRARY</h1>
                                    <div class="breadcrumb-bar">
                                        <ul class="breadcrumb text-center">
                                            <li><a href="index.html">Home</a></li>
                                            <li>LIBRARY</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Breadcrumb Banner Area-->
                <!--Shop Grid Area Start-->
                <div class="shop-grid-area section-padding">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($proyectos as $proyecto): ?>
                            <div class="col-md-3 col-sm-4">
                                <div class="single-product-item">
                                    <div class="single-product-image">
                                        
                                        <?= Html::a("<img src='img/product/".Html::encode($proyecto->Imagen)."' alt=''>", ['site/proyectosdetail', 'id' => $proyecto->idProyecto]);?>
                                    </div>
                                    <div class="single-product-text">
                                        
                                        <h4><?= Html::a(Html::encode($proyecto->Titulo), ['site/proyectosdetail', 'id' => $proyecto->idProyecto]);?></h4>
                                        <h5><p><?= HtmlPurifier::process($proyecto->nombre) ?></p></h5>
                                        <div class="product-price">
                                 
                                           <div class="single-item-rating">
                                               
                                                <div class="starability-result" data-rating="<?=(int)$proyecto->rating?>" aria-describedby="rated-element"></div>
                                           </div>
                                        </div>
                                        <div class="product-buttons">
                                            <?= Html::a("Ver   ", ['site/proyectosdetail', 'id' => $proyecto->idProyecto], ['class' => 'button-default cart-btn']);?>
                                            <button type="button" class="button-default"><i class="zmdi zmdi-favorite"></i></button>
                                            
                                        </div>
                                    </div>
                                    <div class="button-bottom">
                                        
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination-content number">
                                    <?= LinkPager::widget(['pagination' => $pagination]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Shop Grid Area-->

</div>