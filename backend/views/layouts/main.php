<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\DashboardAsset;
use yii\bootstrap\ActiveForm;

DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<a href="main.php"></a>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="with-side-menu control-panel control-panel-compact">
<?php $this->beginBody() ?>

<div class="wrap">
    <header class="site-header">
        <div class="container-fluid">
            <a href="#" class="site-logo">
                <img class="hidden-md-down" src="img/logo-2.png" alt="">
                <img class="hidden-lg-up" src="img/logo-2-mob.png" alt="">
            </a>
            <button class="hamburger hamburger--htla">
                <span>toggle menu</span>
            </button>
            <div class="site-header-content">
                <div class="site-header-content-in">
                    <div class="site-header-shown">
                        <div class="dropdown user-menu">
                            <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="img/upiiz.jpeg" alt="">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
                                <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
                                <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
                                <div class="dropdown-divider"></div>
                                <!--<a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>-->
                                
                                <?php $form = ActiveForm::begin(['action' =>['site/logout'],]) ?>
                                <?= Html::submitButton('<span class="font-icon glyphicon glyphicon-log-out"></span>Logout (admin)', ['class' => 'dropdown-item btn-link', 'name' => 'login-button']) ?>
                                <?php ActiveForm::end(); ?>
                                
                            </div>
                        </div>
    
                        <button type="button" class="burger-right">
                            <i class="font-icon-menu-addl"></i>
                        </button>
                    </div><!--.site-header-shown-->
    
                    <div class="mobile-menu-right-overlay"></div>
                    <div class="site-header-collapsed">
                        <div class="site-header-collapsed-in">
                            <div class="dropdown dropdown-typical">
                                <div class="dropdown-menu" aria-labelledby="dd-header-sales">
                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
                                    <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
                                </div>
                            </div>
                      
                            
                </div><!--site-header-content-in-->
            </div><!--.site-header-content-->
        </div><!--.container-fluid-->
    </header><!--.site-header-->
    <nav class="side-menu">
        <ul class="side-menu-list">
            <li class="grey">
                 <?= Html::a('<i class="font-icon font-icon-case"></i><span class="lbl">Inicio</span>', ['site/index'], ['class' => 'lbl']) ?>
            </li>
            <li class="brown">
                <?= Html::a('<i class="font-icon font-icon-case"></i><span class="lbl">Noticias</span>', ['admin/newsmanager'], ['class' => 'lbl']) ?> 
            </li>
            <li class="purple">
                <?= Html::a('<i class="font-icon font-icon-case"></i><span class="lbl">Especialidades</span>', ['admin/specialitymanager'], ['class' => 'lbl']) ?> 
            </li>
            <li class="green">
                <?= Html::a('<i class="font-icon font-icon-case"></i><span class="lbl">Proyectos</span>', ['admin/projectsmanager'], ['class' => 'lbl']) ?>                
            </li>
            <li class="red">
                <?= Html::a('<i class="font-icon font-icon-case-2"></i><span class="lbl">Eventos</span>', ['site/eventsmanager'], ['class' => 'lbl']) ?> 
            </li>
            <li class="gold with-sub">
                <span>
                    <i class="font-icon font-icon-user"></i>
                    <span class="lbl">Portadas</span>
                </span>
                <ul>
                    <li><?= Html::a('<span class="lbl">Eventos</span>', ['site/index'], ['class' => 'lbl']) ?></li>
                    <li><?= Html::a('<span class="lbl">Nosotros</span>', ['site/index'], ['class' => 'lbl']) ?></li>
                    <li><?= Html::a('<span class="lbl">Proyectos</span>', ['site/index'], ['class' => 'lbl']) ?></li>
                    <li><?= Html::a('<span class="lbl">Especialidades</span>', ['site/index'], ['class' => 'lbl']) ?></li>
                    <li><?= Html::a('<span class="lbl">Contacto</span>', ['site/index'], ['class' => 'lbl']) ?></li>
                    <li><?= Html::a('<span class="lbl">Eventos</span>', ['site/index'], ['class' => 'lbl']) ?></a></li>
                    <li><?= Html::a('<span class="lbl">Noticias</span>', ['site/index'], ['class' => 'lbl']) ?></a></li>
                </ul>
            </li>
            
            <li class="blue-sky">
                <?= Html::a('<i class="font-icon font-icon-contacts"></i><span class="lbl">Nosotros</span>', ['site/index'], ['class' => 'lbl']) ?> 
            </li>
            <li class="aquamarine">
                <?= Html::a('<i class="fa fa-pencil-square-o"></i><span class="lbl">Contactos</span>', ['site/index'], ['class' => 'lbl']) ?> 
            </li>
           <li class="purple">
               <?= Html::a('<i class="glyphicon glyphicon-tasks"></i><span class="lbl">Maestros</span>', ['site/index'], ['class' => 'lbl']) ?> 
            </li>
            <li class="red">
                <?= Html::a('<i class="font-icon font-icon-del"></i><span class="lbl">Salir</span>', ['site/index'], ['class' => 'lbl']) ?> 
            </li>
            
    </nav><!--.side-menu-->
    
    <div class="page-content">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
