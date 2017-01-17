<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- favicon
        ============================================ -->        
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        
        <!-- Google Fonts
        ============================================ -->        
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
       
        <!-- Bootstrap CSS
        ============================================ -->        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <!-- Color Swithcer CSS
        ============================================ -->
        <link rel="stylesheet" href="css/color-switcher.css">
        
        <!-- Fontawsome CSS
        ============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        
        <!-- Owl Carousel CSS
        ============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        
        <!-- jquery-ui CSS
        ============================================ -->
        <link rel="stylesheet" href="css/jquery-ui.css">
        
        <!-- Meanmenu CSS
        ============================================ -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
        
        <!-- Animate CSS
        ============================================ -->
        <link rel="stylesheet" href="css/animate.css">
        
        <!-- Animated Headlines CSS
        ============================================ -->
        <link rel="stylesheet" href="css/animated-headlines.css">
        
        <!-- Nivo slider CSS
        ============================================ -->
        <link rel="stylesheet" href="lib/nivo-slider/css/nivo-slider.css" type="text/css" />
        <link rel="stylesheet" href="lib/nivo-slider/css/preview.css" type="text/css" media="screen" />
        
        <!-- Metarial Iconic Font CSS
        ============================================ -->
        <link rel="stylesheet" href="css/material-design-iconic-font.css">
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
        
        <!-- Slick CSS
        ============================================ -->
        <link rel="stylesheet" href="css/slick.css">
        
        <!-- Video CSS
        ============================================ -->
        <link rel="stylesheet" href="css/jquery.mb.YTPlayer.css">
        
        <!-- Style CSS
        ============================================ -->
        <link rel="stylesheet" href="style.css">
        
        <!-- Color CSS
        ============================================ -->
        <link rel="stylesheet" href="css/color.css">
        
        <!-- Responsive CSS
        ============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
        
        <!-- Modernizr JS
        ============================================ -->        
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        
        <!-- Color Css Files
        ============================================ -->    
        <link rel="alternate stylesheet" type="text/css" href="switcher/color-one.css" title="color-one" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/color-two.css" title="color-two" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/color-three.css" title="color-three" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/color-four.css" title="color-four" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/color-five.css" title="color-five" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/color-six.css" title="color-six" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/color-seven.css" title="color-seven" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/color-eight.css" title="color-eight" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/color-nine.css" title="color-nine" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/color-ten.css" title="color-ten" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/color-ten.css" title="color-ten" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/pattren1.css" title="pattren1" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/pattren2.css" title="pattren2" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/pattren3.css" title="pattren3" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/pattren4.css" title="pattren4" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/pattren5.css" title="pattren5" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/background1.css" title="background1" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/background2.css" title="background2" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/background3.css" title="background3" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/background4.css" title="background4" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="switcher/background5.css" title="background5" media="screen" />
</head>
<body>
<?php $this->beginBody() ?>

<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!--Main Wrapper Start-->
        <div class="as-mainwrapper">
            <!--Bg White Start-->
            <div class="bg-white">
                <!--Header Area Start-->
                <header>
                    <div class="header-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7 col-md-6 col-sm-5 hidden-xs">
                                    <span>Have any question? +968 547856 254</span>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12">
                                    <div class="header-top-right">
                                        <div class="content"><a href="#"><i class="zmdi zmdi-account"></i> My Account</a>
                                            <ul class="account-dropdown">
                                                <li><a href="#">My Account</a></li>
                                                <li><a href="#">Log In</a></li>
                                                <li><a href="#">Register</a></li>
                                                <li><a href="#">Blog</a></li>
                                            </ul>
                                        </div>
                                        <div class="content"><a href="#"><i class="zmdi zmdi-favorite"></i> Wishlist</a></div>
                                        <div class="content"><a href="#"><i class="zmdi zmdi-shopping-basket"></i> Chechout</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-logo-menu sticker">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="logo">
                                        <a href="index.html"><img src="img/logo/logo.png" alt="EDUCAT"></a>
                                    </div>
                                </div>
                                <div class="col-md-9 hidden-sm hidden-xs">
                                    <div class="mainmenu-area pull-right">
                                        <div class="mainmenu">
                                            <nav>
                                                <ul id="nav">
                                                    <li><?= Html::a('Inicio', ['site/index']) ?></li>
                                                    <li><?= Html::a('Nosotros', ['site/about']) ?></li>
                                                    <li><?= Html::a('Especialidades', ['site/courses']) ?></li>
                                                    <li><?= Html::a('Proyectos', ['site/shopgrid']) ?></li>
                                                    <li><?= Html::a('Noticias', ['site/latestnews']) ?></li>
                                                    <li><?= Html::a('Eventos', ['site/event']) ?></li>
                                                    <li><?= Html::a('Contacto', ['site/contact']) ?></li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <ul class="header-search">
                                            <li class="search-menu">
                                                <i id="toggle-search" class="zmdi zmdi-search-for"></i>
                                            </li>
                                        </ul>
                                        <!--Search Form-->
                                        <div class="search">
                                            <div class="search-form">
                                                <form id="search-form" action="#">
                                                    <input type="search" placeholder="Search here..." name="search" />
                                                    <button type="submit">
                                                        <span><i class="fa fa-search"></i></span>
                                                    </button>
                                                </form>                                
                                            </div>
                                        </div>
                                        <!--End of Search Form-->
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div> 

<div class="wrap">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

 <!--Newsletter Area Start-->
                <div class="newsletter-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-sm-5">
                                <div class="newsletter-content">
                                    <h3>SUBSCRIBE</h3>
                                    <h2>TO OUR NEWSLETTER</h2>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7">
                                <div class="newsletter-form angle">
                                    <form action="#" id="mc-form" class="mc-form footer-newsletter fix">
                                        <div class="subscribe-form">
                                            <input id="mc-email" type="email" name="email" placeholder="Enter your email address...">
                                            <button id="mc-submit" type="submit">SUBSCRIBE</button>
                                        </div>    
                                    </form>
                                    <!-- mailchimp-alerts Start -->
                                    <div class="mailchimp-alerts text-centre fix pull-right">
                                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                    </div>
                                    <!-- mailchimp-alerts end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Newsletter Area-->
 <!--Footer Widget Area Start-->
                <div class="footer-widget-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <div class="single-footer-widget">
                                    <div class="footer-logo">
                                        <a href="index.html"><img src="img/logo/footer.png" alt=""></a>
                                    </div>
                                    <p>There are many variations of passg of Lorem Ipsum available, but thmajority have suffered altem, </p>
                                    <div class="social-icons">
                                        <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                        <a href="#"><i class="zmdi zmdi-rss"></i></a>
                                        <a href="#"><i class="zmdi zmdi-google-plus"></i></a>
                                        <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                                        <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <div class="single-footer-widget">
                                    <h3>GET IN TOUCH</h3>
                                    <span><i class="fa fa-phone"></i>+88 018 785 4589</span>
                                    <span><i class="fa fa-envelope"></i>devitems@email.com</span>
                                    <span><i class="fa fa-globe"></i>www.devitems.com</span>
                                    <span><i class="fa fa-map-marker"></i>ur address goes here,street.</span>
                                </div>
                            </div>
                            <div class="col-md-3 hidden-sm">
                                <div class="single-footer-widget">
                                    <h3>Useful Links</h3>
                                    <ul class="footer-list">
                                        <li><a href="#">Teachers &amp; Staff</a></li>
                                        <li><a href="#">Our Courses</a></li>
                                        <li><a href="#">Courses Categories</a></li>
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">Terms &amp; Conditions</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <div class="single-footer-widget">
                                    <h3>Instagram</h3>
                                    <div class="instagram-image">
                                        <div class="footer-img">
                                            <a href="#"><img src="img/footer/1.jpg" alt=""></a>
                                        </div>
                                        <div class="footer-img">
                                            <a href="#"><img src="img/footer/2.jpg" alt=""></a>
                                        </div>
                                        <div class="footer-img">
                                            <a href="#"><img src="img/footer/3.jpg" alt=""></a>
                                        </div>
                                        <div class="footer-img">
                                            <a href="#"><img src="img/footer/4.jpg" alt=""></a>
                                        </div>
                                        <div class="footer-img">
                                            <a href="#"><img src="img/footer/5.jpg" alt=""></a>
                                        </div>
                                        <div class="footer-img">
                                            <a href="#"><img src="img/footer/6.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Footer Widget Area-->
                <!--Footer Area Start-->
 <footer class="footer-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-7">
                                <span>Copyright &copy; EDUCAT 2016.All right reserved.Created by <a href="#">Devitems</a></span>
                            </div>
                            <div class="col-md-6 col-sm-5">
                                <div class="column-right">
                                    <span>Privacy Policy , Terms &amp; Conditions</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- jquery
        ============================================ -->        
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        
        <!-- bootstrap JS
        ============================================ -->        
        <script src="js/bootstrap.min.js"></script>
        
        <!-- nivo slider js
        ============================================ -->       
        <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="lib/nivo-slider/home.js" type="text/javascript"></script>
        
        <!-- meanmenu JS
        ============================================ -->        
        <script src="js/jquery.meanmenu.js"></script>
        
        <!-- wow JS
        ============================================ -->        
        <script src="js/wow.min.js"></script>
        
        <!-- owl.carousel JS
        ============================================ -->        
        <script src="js/owl.carousel.min.js"></script>
        
        <!-- scrollUp JS
        ============================================ -->        
        <script src="js/jquery.scrollUp.min.js"></script>
        
        <!-- Waypoints JS
        ============================================ -->        
        <script src="js/waypoints.min.js"></script>
        
        <!-- Counterup JS
        ============================================ -->        
        <script src="js/jquery.counterup.min.js"></script>
        
        <!-- Slick JS
        ============================================ -->        
        <script src="js/slick.min.js"></script>
        
        <!-- Animated Headlines JS
        ============================================ -->        
        <script src="js/animated-headlines.js"></script>
        
        <!-- Textilate JS
        ============================================ -->        
        <script src="js/textilate.js"></script>
        
        <!-- Lettering JS
        ============================================ -->        
        <script src="js/lettering.js"></script>
        
        <!-- Video Player JS
        ============================================ -->        
        <script src="js/jquery.mb.YTPlayer.js"></script>
        
        <!-- Mail Chimp JS
        ============================================ -->        
        <script src="js/jquery.ajaxchimp.min.js"></script>
        
        <!-- AJax Mail JS
        ============================================ -->        
        <script src="js/ajax-mail.js"></script>
        
        <!-- plugins JS
        ============================================ -->        
        <script src="js/plugins.js"></script>
        
        <!-- StyleSwitch JS
        ============================================ -->    
        <script src="js/styleswitch.js"></script>
        
        <!-- main JS
        ============================================ -->        
        <script src="js/main.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
