<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\ActiveForm;
use app\assets\DashboardAsset;

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
                                <!--<a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>-->
                                <div class="dropdown-divider"></div>
                                <?php $form = ActiveForm::begin(['action' =>['site/logout'],]) ?>
                                <?= Html::submitButton('<span class="font-icon glyphicon glyphicon-log-out"></span>Salir (admin)', ['class' => 'dropdown-item btn-link', 'name' => 'login-button']) ?>
                                <?php ActiveForm::end(); ?>
                                
                            </div>
                        </div>
    
                        <button type="button" class="burger-right">
                            <i class="font-icon-menu-addl"></i>
                        </button>
                    </div><!--.site-header-shown-->
        </div><!--.container-fluid-->
    </header><!--.site-header-->
    <nav class="side-menu">
        <ul class="side-menu-list">
            <li class="magenta">
                 <?= Html::a('<i class="glyphicon glyphicon-home"></i><span class="lbl">Inicio</span>', ['site/index'], ['class' => 'lbl']) ?>
            </li>
            <li class="grey">
                <?= Html::a('<i class="font-icon font-icon-case"></i><span class="lbl">Noticias</span>', ['admin/newsmanager'], ['class' => 'lbl']) ?> 
            </li>
            <li class="orange-red with-sub">
				<span>
                    <i class="glyphicon glyphicon-star"></i>
                    <span class="lbl">Especialidades</span>
                </span>
				<ul>
					<li><?= Html::a('<span class="lbl">Especialidad</span>', ['admin/specialitymanager'], ['class' => 'lbl']) ?></li>
					<li><?= Html::a('<span class="lbl">Categoría</span>', ['admin/specialitycategorymanager'], ['class' => 'lbl']) ?></li>
				</ul>
            </li>
            <li class="magenta with-sub">
				<span>
                    <i class="glyphicon glyphicon-star"></i>
                    <span class="lbl">Proyectos</span>
                </span>
				<ul>
					<li><?= Html::a('<span class="lbl">Proyecto</span>', ['admin/projectsmanager'], ['class' => 'lbl']) ?></li>
					<li><?= Html::a('<span class="lbl">Categoría</span>', ['admin/projectcategorymanager'], ['class' => 'lbl']) ?></li>
				</ul>              
            </li>
            <li class="grey with-sub">
                <?= Html::a('<i class="font-icon font-icon-case-2"></i><span class="lbl">Eventos</span>', ['admin/eventsmanager'], ['class' => 'lbl']) ?> 
            </li>
			<li class="orange-red">
                <?= Html::a('<i class="font-icon font-icon-case-2"></i><span class="lbl">Alumnos</span>', ['admin/studentsmanager'], ['class' => 'lbl']) ?> 
            </li>
			<li class="magenta">
                <?= Html::a('<i class="font-icon font-icon-case-2"></i><span class="lbl">Maestros</span>', ['admin/teachersmanager'], ['class' => 'lbl']) ?> 
            </li>
			<li class="grey">
                <?= Html::a('<i class="font-icon font-icon-case-2"></i><span class="lbl">Slides</span>', ['admin/slidesmanager'], ['class' => 'lbl']) ?> 
            </li>
			<li class="orange-red">
                <?= Html::a('<i class="font-icon font-icon-case-2"></i><span class="lbl">Experiencia</span>', ['admin/experiencemanager'], ['class' => 'lbl']) ?> 
            </li>
			 <li class="magenta with-sub">
				<span>
                    <i class="glyphicon glyphicon-list-alt"></i>
                    <span class="lbl">Páginas</span>
                </span>
				<ul>
					<li><?= Html::a('<span class="lbl">Contacto</span>', ['admin/contactmanager'], ['class' => 'lbl']) ?></li>
					<li><?= Html::a('<span class="lbl">Enlaces</span>', ['admin/linksmanager'], ['class' => 'lbl']) ?></li>
					<li><?= Html::a('<span class="lbl">Imagenes Portada</span>', ['admin/frontpagemanager'], ['class' => 'lbl']) ?></li>
					<li><?= Html::a('<span class="lbl">Inicio</span>', ['admin/indexmanager'], ['class' => 'lbl']) ?></li>
					<li><?= Html::a('<span class="lbl">Nosotros</span>', ['admin/usmanager'], ['class' => 'lbl']) ?></li>
				</ul>              
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
