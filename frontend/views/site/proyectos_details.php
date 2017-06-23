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
     $(".introStar").click(function() {
        this.form.submit();    
     });
});
JS;
$script2 = <<< JS
$(document).ready(function() {
    $("#alertButton").click(function() {
    $('#alertB').show("slow");    
  });
    $("#alertButton2").click(function() {
    $('#alertA').show("slow");    
  });
    $(".introStar").click(function() {
    $('#alertB').show("slow");     
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

$this->title = 'Courses_detalles';
if($rating->cnt==null){
    $rating->cnt=0;
}
if($model->rating==null){
    $model->rating=(int)($rating->cnt);
}


?>
<div class="site-courses">
   <!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area " style="background-image: url('img/banner/<?= Html::encode($portada->imagen) ?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h1 class="text-center">PRODUCT DETAILS</h1>
                                    <div class="breadcrumb-bar">
                                        <ul class="breadcrumb text-center">
                                            <li><a href="index.html">Home</a></li>
                                            <li>PRODUCT DETAILS</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <!--End of Breadcrumb Banner Area--> 
    <!--Product Details Area Start--> 
                <div class="product-details-area section-top-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="product-details-image">
                                    <img src="img/details/<?= Html::encode($proyecto->Imagen) ?>" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="product-details-content">
                                    
                                        <h2><?= Html::encode($proyecto->Titulo) ?></h2>
                                        <div class="product-name-rating">
                                            <h5><?= Html::encode($categoria->Nombre) ?></h5>
                                            
                                        </div>
                                        <?= HtmlPurifier::process($proyecto->Descripcion) ?>
                                        
                                        <div class="social-links">
                                            
                                            
                                            
                                               <?php Pjax::begin(); ?>
                                                           <?php $form = ActiveForm::begin(['options' => ['data-pjax' => '']]); ?>
                                                           
                                                           <?= $form->field($model, 'rating')->radioList(['5' => '', '4' => '', '3' => '', '2' => '', '1' => ''],['class' => 'starability-checkmark','item' => function($index, $label, $name, $checked, $value) {
                                                                $check1='';
                                    if($checked==1){
                                        $check1='checked="true"';
                                    }
                                    $return = '<input type="radio" '.$check1.' class="introStar" name="' . $name . '" value="' . $value . '" id="rate'.(5-$index).'"/>';
                                    $return .= '<label for="rate'.(5-$index).'" title="">'.$label.'</label>';
                                    

                                    return $return;
                                }])->label(false);?>
                                                            <?= $form->field($model, 'idEspecialidad')->hiddenInput(['value'=>$proyecto->idProyecto])->label(false); ?>
                                                     
                                                           
                                                            
                                         
                                                  
                                                              
                                                           <?php ActiveForm::end(); ?>
                                                            <?php Pjax::end(); ?>
                                          
                                        </div>
                                         <?= Html::tag('div', Html::a('Requiere Iniciar Sesion para Calificar', ['site/login'], ['class' => 'profile-link']), ['class' => 'alert alert-success','style'=>'display: none;','id' => 'alertB']) ?>
                                        <span>Share this product</span>
                                        <div class="social-links">
                                            <a href="#"><i class="zmdi zmdi-facebook"></i></a>
         
                                        </div>
                                   
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
    <!--End of Product Details Area--> 
                
                
    <!--Online Product Area Start-->
                <div class="product-area section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title-wrapper">
                                    <div class="section-title">
                                        <h3>Related Product</h3>
                                        <p>There are many variations of passages</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($proyectosals as $proyecto): ?>
                            
                            <div class="col-md-3 col-sm-4">
                                <div class="single-product-item">
                                    <div class="single-product-image">
                                        <a href="#"><img src="img/product/1.jpg" alt=""></a>
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
                                </div>
                            </div>
                            <?php endforeach; ?>
                            
                        </div>
<!--                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination-content number">
                                    <ul class="pagination">
                                        <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li class="current"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
    <!--End of Online Product Area-->
    
    
    
    
</div>