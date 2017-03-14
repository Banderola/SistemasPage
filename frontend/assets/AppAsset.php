<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/color-switcher.css',
        'css/font-awesome.min.css',
        'css/owl.carousel.css',
        'css/jquery-ui.css',
        'css/meanmenu.min.css',
        'css/animate.css',
        'css/animated-headlines.css',
        'lib/nivo-slider/css/nivo-slider.css',
        'lib/nivo-slider/css/preview.css',
        'css/material-design-iconic-font.css',
        'css/material-design-iconic-font.min.css',
        'css/slick.css',
        'css/jquery.mb.YTPlayer.css',
        'style.css',
        'css/color.css',
        'css/responsive.css',
        'https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800',
        'css/starwars.css',
    ];
    public $js = [
        'js/vendor/modernizr-2.8.3.min.js',
        'js/vendor/jquery-1.12.4.min.js',
        'lib/nivo-slider/js/jquery.nivo.slider.js',
        'lib/nivo-slider/home.js',
        'js/jquery.meanmenu.js',
        'js/wow.min.js',
        'js/owl.carousel.min.js',
        'js/jquery.scrollUp.min.js',
        'js/waypoints.min.js',
        'js/jquery.counterup.min.js',
        'js/slick.min.js',
        'js/animated-headlines.js',
        'js/textilate.js',
        'js/lettering.js',
        'js/jquery.mb.YTPlayer.js',
        'js/jquery.ajaxchimp.min.js',
        'js/ajax-mail.js',
        'js/plugins.js',
        'js/styleswitch.js',
        'js/main.js',
        'js/starwars.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
