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
$contacto = $this->params['model'];
$enlaces = $this->params['model_enlaces']
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
                                    <span>Tienes alguna pregunta? <?= $contacto->telefono ?></span>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12">
                                    <div class="header-top-right">
                                        <div class="content"><a href="#"><i class="zmdi zmdi-account"></i>Cuenta</a>
                                            <ul class="account-dropdown">
                                                
                                                <?php
                                                if (Yii::$app->user->isGuest) {
                                                    echo '<li>'.Html::a('Inicio de Sesión', ['site/login']).'</li>'.
                                                    '<li>'.Html::a('Registro', ['site/signup']).'</li>';
                                                    
                                                   
                                                    
                                                }
                                                else{
                                                    echo '<li>'.Html::a('Mi Cuenta', ['site/cuenta']).'</li><li>'.Html::a('Cerrar Sesión', ['site/logout']).'</li>';
                                                   
                                                    
                                                }
                                                
                                                 ?>
                                            </ul>
                                        </div>
                                        <div class="content"><?=Html::a('<i class="zmdi zmdi-favorite"></i>', ['site/acerca'])?></div>
                                        
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
                                        <a href="index.php"><img src="img/logo/upiiz.png" alt="UPIIZ" width="120" height="120"></a>
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
                    <div class="mobile-menu-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mobile-menu">
                                        <nav id="dropdown">
                                            <ul>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu Area end -->    
                </header>
                <!--End of Header Area-->        

    
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
   


 <!--Newsletter Area Start-->
                <div class="newsletter-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-sm-5">
                                <div class="newsletter-content">
                                    <h3>SUSCRÍBETE</h3>
                                    <h2>A NUESTRO BOLETÍN</h2>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7">
                                <div class="newsletter-form angle">
                                    <form action="#" id="mc-form" class="mc-form footer-newsletter fix">
                                        <div class="subscribe-form">
                                            <input id="mc-email" type="email" name="email" placeholder="Ingrese su correo electónico...">
                                            <button id="mc-submit" type="submit">SUSCRÍBETE</button>
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
                                    <p><?= $contacto->PiePagina ?> </p>
                                    <div class="social-icons">
                                        <a href="<?= $contacto->faceLink ?>"><i class="zmdi zmdi-facebook"></i></a>
                                        <a href="<?= $contacto->rssLink ?>"><i class="zmdi zmdi-rss"></i></a>
                                        <a href="<?= $contacto->googleLink ?>"><i class="zmdi zmdi-google-plus"></i></a>
                                        <a href="<?= $contacto->pintLink ?>"><i class="zmdi zmdi-pinterest"></i></a>
                                        <a href="<?= $contacto->instagramLink ?>"><i class="zmdi zmdi-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <div class="single-footer-widget">
                                    <h3>Contacto</h3>
                                    <span><i class="fa fa-phone"></i><?= $contacto->telefono ?></span>
                                    <span><i class="fa fa-envelope"></i><?= $contacto->correo ?></span>
                                    <span><i class="fa fa-globe"></i><?= $contacto->paginaWeb ?></span>
                                    <span><i class="fa fa-map-marker"></i><?= $contacto->direccion ?></span>
                                </div>
                            </div>
                            <div class="col-md-3 hidden-sm">
                                <div class="single-footer-widget">
                                    <h3>Enlaces</h3>
                                    <ul class="footer-list">
                                        <?php foreach($enlaces as $enlace): ?>
                                        <li><a href="<?= $enlace->link ?>"><?= $enlace->titulo ?></a></li>
                                        <?php endforeach; ?>
                                        
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
                                <span>Copyright &copy; UPIIZ 2018. All right reserved.</span>
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
