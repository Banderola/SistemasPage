<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAlternate extends AssetBundle 
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'switcher/color-one.css',
        'switcher/color-two.css',
        'switcher/color-three.css',
        'switcher/color-four.css',
        'switcher/color-five.css',
        'switcher/color-six.css',
        'switcher/color-seven.css',
        'switcher/color-eight.css',
        'switcher/color-nine.css',
        'switcher/color-ten.css',
        'switcher/pattren1.css',
        'switcher/pattren2.css',
        'switcher/pattren3.css',
        'switcher/pattren4.css',
        'switcher/pattren5.css',
        'switcher/background1.css',
        'switcher/background2.css',
        'switcher/background3.css',
        'switcher/background4.css',
        'switcher/background5.css',
    ];
    public $cssOptions = ['rel' => 'alternate stylesheet'];
   
}

