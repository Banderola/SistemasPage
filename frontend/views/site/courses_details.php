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
                                    <h1 class="text-center">COURSES DETAILS</h1>
                                    <div class="breadcrumb-bar">
                                        <ul class="breadcrumb text-center">
                                            <li><a href="index.html">Home</a></li>
                                            <li>COURSES DETAILS</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Breadcrumb Banner Area-->
                
                <!--Course Details Area Start-->
                <div class="course-details-area section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="course-details-content">
                                    <div class="single-course-details">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="overlay-effect">
                                                    <a href="#"><img alt="" src="img/details/<?= Html::encode($course->imagen) ?>"></a>
                                                </div>
                                            </div>  
                                            <div class="col-md-6">
                                                <div class="single-item-text">
                                                    <h4><?= Html::encode($course->Titulo) ?></h4>
                                                    <div class="single-item-text-info">
                                                        <span>Por: <span><?= Html::encode($maestro->nombre) ?></span></span>
                     
                                                    </div>
                                                    <div class="course-text-content">
                                                        <?= HtmlPurifier::process($course->Descripcion) ?>
                                                    </div>    
                                                    <div class="single-item-content">
                                                       <div class="single-item-comment-view">
                                                           <span><i class="zmdi zmdi-eye"></i><?= Html::encode($course->Visitas) ?></span>
                                                           <span><i class="zmdi zmdi-comments"></i><?= Html::encode($comentarios) ?></span>
                                                       </div>
                                                        
                                                      

   
    

    

   

    
                                                    <div class="single-item-rating">
                                                           <?php Pjax::begin(); ?>
                                                           <?php $form = ActiveForm::begin(['options' => ['data-pjax' => '']]); ?>
                                                           
                                                           <?= $form->field($model, 'rating')->radioList(['5' => '', '4' => '', '3' => '', '2' => '', '1' => ''],['class' => 'starability-checkmark', 'item' => function($index, $label, $name, $checked, $value) {
                                                                $check1='';
                                    if($checked==1){
                                        $check1='checked="true"';
                                    }
                                    $return = '<input type="radio" '.$check1.' class="introStar" name="' . $name . '" value="' . $value . '" id="rate'.(5-$index).'"/>';
                                    $return .= '<label for="rate'.(5-$index).'" title="">'.$label.'</label>';
                                   
                                    

                                    return $return;
                                }])->label(false);?>
                                                            <?= $form->field($model, 'idEspecialidad')->hiddenInput(['value'=>$course->idEspecialidades])->label(false); ?>
                 
                                                            
                                         
                                                           
                                                      
                                                              
                                                           <?php ActiveForm::end(); ?>
                                                            <?php Pjax::end(); ?>
<!--                                                           <i class="zmdi zmdi-star"></i>
                                                           <i class="zmdi zmdi-star"></i>
                                                           <i class="zmdi zmdi-star"></i>
                                                           <i class="zmdi zmdi-star"></i>
                                                           <i class="zmdi zmdi-star-half"></i>-->
                                                    </div>  
                                                        
                                                        
                                                    </div> 
                                                    <?= Html::tag('div', Html::a('Requiere Iniciar Sesion para Calificar', ['site/login'], ['class' => 'profile-link']), ['class' => 'alert alert-success','style'=>'display: none;','id' => 'alertB']) ?>
                                                </div>
                                            </div> 
                                        </div>     
                                    </div>
                                    
                                    <div class="comments" >
                                        <div style="overflow-y:scroll; height:300px;">
                                        <?php Pjax::begin(); ?>
                                        <?= Html::a("", ['site/coursesdetail', 'id'=>$course->idEspecialidades], ['id' => 'refreshButton']) ?>
                                        
                                        <?php foreach ($comentariosesp as $comentarioe): ?>
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
                                                                    <?= $formc->field($model2, 'idEspecialidad')->hiddenInput(['value'=>$course->idEspecialidades])->label(false); ?>
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
                                        
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-3">
                                <div class="sidebar-widget">
                                    <div class="single-sidebar-widget">
                                        <div class="tution-wrapper">
                                            <div class="tution-fee">
                                                <h1>Imparte</h1>
                                            </div>
                                            <div class="tutor-image">
                                                <img src="img/teacher/<?= Html::encode($maestro->imagen) ?>" height="126" width="126">
                                            </div>
                                            <div class="single-teacher-text">
                                                <h3><a href="#"><?= Html::encode($maestro->nombre) ?></a></h3>
                                                <h4><?= Html::encode($maestro->tipo) ?></h4>
                                                <p><?= HtmlPurifier::process($maestro->descripcion) ?></p>
                                                <div class="social-links">
                                                    <a href="<?= Html::encode($maestro->linkFace) ?>"><i class="zmdi zmdi-facebook"></i></a>
                                                    <a href="<?= Html::encode($maestro->linkTwitter) ?>"><i class="zmdi zmdi-twitter"></i></a>
                                                    <a href="<?= Html::encode($maestro->linkGoogle) ?>"><i class="zmdi zmdi-google-old"></i></a>
                                                    <a href="<?= Html::encode($maestro->linkInstagram) ?>"><i class="zmdi zmdi-instagram"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="single-sidebar-widget">
                                        <h4 class="title">Cursos Relacionados</h4>
                                        <div class="single-item">
                                            <?php foreach ($courseals as $courseal): ?>
                                            <div class="single-item-image overlay-effect">
                                                <a href="#"><img alt="" src="img/course/<?= Html::encode($courseal->imagen) ?>"></a>
                                            </div>
                                            <div class="single-item-text">
                                                <h4><a href="#"><?= Html::encode($courseal->Titulo) ?></a></h4>
                                                <div class="single-item-text-info">
                                                    
                                                </div>
                                                <p><?= HtmlPurifier::process($courseal->Descripcion) ?></p>
                                                <div class="single-item-content">
                                                   <div class="single-item-comment-view">
                                                       <span><i class="zmdi zmdi-eye"></i><?= Html::encode($courseal->Visitas) ?></span>
                                                       <span><i class="zmdi zmdi-comments"></i><?= Html::encode($courseal->cnt) ?></span>
                                                   </div>
                                                   <div class="single-item-rating">
                                                       <?php for ($i = 0;$i<$courseal->rating;$i++): ?>
                                                        <i class="zmdi zmdi-star"></i>
                                                       <?php endfor; ?>
                                                   </div>
                                                </div>   
                                            </div>
                                            <div class="button-bottom">
                                                <?= Html::a("Ver", ['site/coursesdetail', 'id' => $courseal->idEspecialidades], ['class' => 'button-default']);?>
                                            </div>
                                            <?php endforeach; ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Course Details Area-->
    
    
</div>

