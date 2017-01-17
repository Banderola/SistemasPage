<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
 <!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h1 class="text-center">CONTACT US</h1>
                                    <div class="breadcrumb-bar">
                                        <ul class="breadcrumb text-center">
                                            <li><a href="index.html">Home</a></li>
                                            <li>CONTACT</li>
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
                                <h4 class="contact-title">contact info</h4>
                                <div class="contact-text">
                                    <p><span class="c-icon"><i class="zmdi zmdi-phone"></i></span><span class="c-text">+88 018 785 454 589</span></p>
                                    <p><span class="c-icon"><i class="zmdi zmdi-email"></i></span><span class="c-text">devitems@email.com</span></p>
                                    <p><span class="c-icon"><i class="zmdi zmdi-pin"></i></span><span class="c-text">House 09, Road 32, Mohammadpur,<br>
                                    Dhaka-1200, UK</span></p>
                                </div>
                                <h4 class="contact-title">social media</h4>
                                <div class="link-social">
                                    <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                    <a href="#"><i class="zmdi zmdi-rss"></i></a>
                                    <a href="#"><i class="zmdi zmdi-google-plus"></i></a>
                                    <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                                    <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h4 class="contact-title">send your massage</h4>
                                <form id="contact-form" action="mail.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="name" placeholder="name">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="col-md-12">
                                            <textarea name="message" cols="30" rows="10" placeholder="Message"></textarea>
                                            <button type="submit" class="button-default">SUBMIT</button>
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Contact Form-->
 
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script>
            function initialize() {
              var mapOptions = {
                zoom: 15,
                scrollwheel: false,
                center: new google.maps.LatLng(23.763494, 90.432226)
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
