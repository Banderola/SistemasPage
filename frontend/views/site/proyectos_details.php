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
    $("#alertButton").click(function() {
    $('#alertB').show("slow");    
  });
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
 }

$this->title = 'Courses_detalles';
$model2->descripcion='';
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
                                            <h5><?= HtmlPurifier::process($proyecto->Descripcion) ?></h5>
                                            
                                        </div>
                                        <p>There are many variations of passages of Lorepsumavable, but the majority have suffered alteration in some form, by injected humour, </p>
                                        
                                        <div class="social-links">
                                            
                                            
                                            
                                               <?php Pjax::begin(); ?>
                                                           <?php $form = ActiveForm::begin(['options' => ['data-pjax' => '']]); ?>
                                                           
                                                           <?= $form->field($model, 'rating')->radioList(['5' => '', '4' => '', '3' => '', '2' => '', '1' => ''],['class' => 'starability-basic','item' => function($index, $label, $name, $checked, $value) {
                                                                $check1='';
                                    if($checked==1){
                                        $check1='checked="true"';
                                    }
                                    $return = '<input type="radio" '.$check1.' name="' . $name . '" value="' . $value . '" id="rate'.(5-$index).'"/>';
                                    $return .= '<label for="rate'.(5-$index).'" title="">'.$label.'</label>';
                                    

                                    return $return;
                                }])->label(false);?>
                                                            <?= $form->field($model, 'idEspecialidad')->hiddenInput(['value'=>$proyecto->idProyecto])->label(false); ?>
                                                     
                                                           
                                                            
                                         
                                                           
                                                        <?php if (!Yii::$app->user->isGuest): ?>
                                                           <?= Html::submitButton('Calificar', ['class' => 'btn btn-success']) ?>
                                                           
                                                        <?php else: ?>
                                                           <?= Html::button('Calificar', ['class' => 'btn btn-success','id' => 'alertButton']) ?>
                                                           
                                                           
                                                        <?php endif ?>
                                                              
                                                           <?php ActiveForm::end(); ?>
                                                            <?php Pjax::end(); ?>
                                          
                                        </div>
                                    <?= Html::tag('div', Html::a('Requiere Iniciar Sesion para Calificar', ['site/login'], ['class' => 'profile-link']), ['class' => 'alert alert-success','style'=>'display: none;','id' => 'alertB']) ?>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
    <!--End of Product Details Area--> 
                <div style="overflow-y:scroll; height:300px;">
                                        <?php Pjax::begin(); ?>
                                        <?= Html::a("", ['site/proyectosdetail', 'id'=>$proyecto->idProyecto], ['id' => 'refreshButton']) ?>
                                        
                                        <?php foreach ($comentariospro as $comentarioe): ?>
                                            <h1></h1>
                                        <div class="single-comment">
                                            
                                            <div class="author-image">
                                                <img src="img/comment/<?= Html::encode($comentarioe->imagen) ?>" alt="">
                                            </div>
                                            <div class="comment-text">
                                                <div class="author-info">
                                                    <h4><a href="#"><?= Html::encode($comentarioe->nombre) ?></a></h4>
                                                    <span class="comment-time">Publicado el <?= Html::encode($comentarioe->Fecha) ?> </span>
                                                </div>
                                                <p><?= Html::encode($comentarioe->Descripcion) ?></p>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        <?php Pjax::end(); ?>
                                        </div>
                <div class="single-comment">
                                            
                                         
                                             <!--Contact Form Area Start-->
                                        <div class="contact-form-area section-padding">
                                            
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <h4 class="contact-title">Enviar un comentario</h4>
                                                        
                                                        
                                                            <div class="row" >
                                                               
                                                                <div class="col-md-12">
                                                                <?php Pjax::begin(); ?>
                                                                <?php $formc = ActiveForm::begin(['options' => ['data-pjax' => '']]); ?>
                                                                    <?= $formc->field($model2, 'descripcion')->textarea(['rows' => '10','cols' => '30'])->label(false); ?>
                                                                    <?= $formc->field($model2, 'idEspecialidad')->hiddenInput(['value'=>$proyecto->idProyecto])->label(false); ?>
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
                                                        
                                                        
                                                        <p class="form-messege"></p>
                                                    </div>
                                                    
                                                </div>
                                                <?= Html::tag('div', Html::a('Requiere Iniciar Sesion para Comentar', ['site/login'], ['class' => 'profile-link']), ['class' => 'alert alert-success','style'=>'display: none;','id' => 'alertA']) ?>
                                            </div>
                                        </div>
                                        <!--End of Contact Form-->
                                        </div>
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
                            <div class="col-md-3 col-sm-4">
                                <div class="single-product-item">
                                    <div class="single-product-image">
                                        <a href="#"><img src="img/product/1.jpg" alt=""></a>
                                    </div>
                                    <div class="single-product-text">
                                        <h4><a href="#">Title Product Here</a></h4>
                                        <h5>Book</h5>
                                        <div class="product-price">
                                            <h3>$ 28</h3>
                                           <div class="single-item-rating">
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star-half"></i>
                                           </div>
                                        </div>
                                        <div class="product-buttons">
                                            <button type="button" class="button-default cart-btn">ADD TO CART</button>
                                            <button type="button" class="button-default"><i class="zmdi zmdi-favorite"></i></button>
                                            <button type="button" class="button-default"><i class="zmdi zmdi-refresh-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <div class="single-product-item">
                                    <div class="single-product-image">
                                        <a href="#"><img src="img/product/2.jpg" alt=""></a>
                                    </div>
                                    <div class="single-product-text">
                                        <h4><a href="#">Title Product Here</a></h4>
                                        <h5>Book</h5>
                                        <div class="product-price">
                                            <h3>$ 28</h3>
                                           <div class="single-item-rating">
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star-half"></i>
                                           </div>
                                        </div>
                                        <div class="product-buttons">
                                            <button type="button" class="button-default cart-btn">ADD TO CART</button>
                                            <button type="button" class="button-default"><i class="zmdi zmdi-favorite"></i></button>
                                            <button type="button" class="button-default"><i class="zmdi zmdi-refresh-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <div class="single-product-item">
                                    <div class="single-product-image">
                                        <a href="#"><img src="img/product/3.jpg" alt=""></a>
                                    </div>
                                    <div class="single-product-text">
                                        <h4><a href="#">Title Product Here</a></h4>
                                        <h5>Book</h5>
                                        <div class="product-price">
                                            <h3>$ 28</h3>
                                           <div class="single-item-rating">
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star-half"></i>
                                           </div>
                                        </div>
                                        <div class="product-buttons">
                                            <button type="button" class="button-default cart-btn">ADD TO CART</button>
                                            <button type="button" class="button-default"><i class="zmdi zmdi-favorite"></i></button>
                                            <button type="button" class="button-default"><i class="zmdi zmdi-refresh-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 hidden-sm">
                                <div class="single-product-item">
                                    <div class="single-product-image">
                                        <a href="#"><img src="img/product/4.jpg" alt=""></a>
                                    </div>
                                    <div class="single-product-text">
                                        <h4><a href="#">Title Product Here</a></h4>
                                        <h5>Book</h5>
                                        <div class="product-price">
                                            <h3>$ 28</h3>
                                           <div class="single-item-rating">
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star-half"></i>
                                           </div>
                                        </div>
                                        <div class="product-buttons">
                                            <button type="button" class="button-default cart-btn">ADD TO CART</button>
                                            <button type="button" class="button-default"><i class="zmdi zmdi-favorite"></i></button>
                                            <button type="button" class="button-default"><i class="zmdi zmdi-refresh-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                        </div>
                    </div>
                </div>
    <!--End of Online Product Area-->
    
    
    
    
</div>