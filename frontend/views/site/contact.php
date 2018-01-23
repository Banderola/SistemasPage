<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$contacto = $this->params['model'];
$this->title = 'Contacto';
?>
<div class="site-contact">
 <!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area" style="background-image: url('<?= Yii::getAlias('@uploadUrl').'/'.$portada->imagen ?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h1 class="text-center">CONTACTO</h1>
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
                <!--Google Map Area Start-->
                <div class="google-map-area">
                    <!--  Map Section -->
                    <div id="contacts" class="map-area">
                        <div id="googleMap" style="width:100%;height:485px;filter: grayscale(100%);-webkit-filter: grayscale(100%);"></div>
                    </div>
                </div>
                <!--End of Google Map Area-->
                <!--Contact Form Area Start-->
                <div class="contact-form-area section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="contact-title">Información de contacto</h4>
                                <div class="contact-text">
                                    <p><span class="c-icon"><i class="zmdi zmdi-phone"></i></span><span class="c-text"><?= $contacto->telefono ?></span></p>
                                    <p><span class="c-icon"><i class="zmdi zmdi-email"></i></span><span class="c-text"><?= $contacto->correo ?></span></p>
                                    <p><span class="c-icon"><i class="zmdi zmdi-pin"></i></span><span class="c-text"><?= $contacto->direccion ?>
<!--                                            <br>
                                    Dhaka-1200, UK-->
                                        </span></p>
                                </div>
                                <h4 class="contact-title">Redes sociales</h4>
                                <div class="link-social">
                                    <a href="<?= $contacto->faceLink ?>"><i class="zmdi zmdi-facebook"></i></a>
                                    <a href="<?= $contacto->rssLink ?>"><i class="zmdi zmdi-rss"></i></a>
                                    <a href="<?= $contacto->googleLink ?>"><i class="zmdi zmdi-google-plus"></i></a>
                                    <a href="<?= $contacto->pintLink ?>"><i class="zmdi zmdi-pinterest"></i></a>
                                    <a href="<?= $contacto->instagramLink ?>"><i class="zmdi zmdi-instagram"></i></a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h4 class="contact-title">Envía tu mensaje</h4>
                                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'button-default', 'name' => 'button-default']) ?>
                </div>

            <?php ActiveForm::end(); ?>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Contact Form-->
 
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5MSXtuXlv2Tma8PslZARGWHDeEyk2b8I"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script>
            function initialize() {
              var mapOptions = {
                zoom: 15,
                scrollwheel: false,
                center: new google.maps.LatLng(22.7839516, -102.6157299)
              };

              var map = new google.maps.Map(document.getElementById('googleMap'),
                  mapOptions);


              var marker = new google.maps.Marker({
                position: map.getCenter(),
                animation:google.maps.Animation.BOUNCE,
                icon: 'img/map-marker.png',
                map: map
              });
                
            }
                
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        
        <!-- StyleSwitch JS
        ============================================ -->    
        <script src="js/styleswitch.js"></script>
        
        <!-- main JS
        ============================================ -->        
        <script src="js/main.js"></script>
</div>
