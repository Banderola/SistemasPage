<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\AppAlternate;
use common\widgets\Alert;

AppAsset::register($this);
AppAlternate::register($this);
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
       
</head>
<body>
    <?php if (!Yii::$app->user->isGuest) { ?>
    <div class="user-role"><?= Yii::$app->user->identity->getRoleName() ?></div>
<?php } ?>
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
                                                
                                                <?php
                                                if (Yii::$app->user->isGuest) {
                                                    echo '<li>'.Html::a('Login', ['site/login']).'</li>'.
                                                    '<li>'.Html::a('Register', ['site/signup']).'</li>
                                                    <li><a href="#">Blog</a></li>';
                                                    
                                                   
                                                    
                                                }
                                                else{
                                                    echo '<li><a href="#">My Account</a></li><li>'.Html::a('Logout', ['site/logout']).'</li>
                                                    <li><a href="#">Blog</a></li>';
                                                    
                                                }
                                                
                                                 ?>
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
                

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
