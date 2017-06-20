
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<a href="main.php"></a>
    <meta name="csrf-param" content="_csrf-backend">
    <meta name="csrf-token" content="ajdDR1otRk9aAwpyY3IFBllzdz4UFQE3PnR0ahxrcTUYR3IqHGUqIw==">
    <title>Subir Noticia</title>
    <link href="/SistemasPage/backend/web/assets/f5086e32/css/bootstrap.css" rel="stylesheet">
<link href="/SistemasPage/backend/web/assets/415df95a/cropper.css" rel="stylesheet">
<link href="/SistemasPage/backend/web/css/main.css" rel="stylesheet">
<link href="/SistemasPage/backend/web/css/lib/lobipanel/lobipanel.min.css" rel="stylesheet">
<link href="/SistemasPage/backend/web/css/lib/jqueryui/jquery-ui.min.css" rel="stylesheet">
<link href="/SistemasPage/backend/web/css/lib/font-awesome/font-awesome.min.css" rel="stylesheet">
<link href="/SistemasPage/backend/web/css/site.css" rel="stylesheet">
<style>
    label[for=newsform-_image] {
        display: none;
    }
    #cropper-modal-cropper_592094772ff1b img{
        max-width: 100%;
    }
    #cropper-modal-cropper_592094772ff1b .btn-file {
        position: relative;
        overflow: hidden;
    }
    #cropper-modal-cropper_592094772ff1b .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
    #cropper-modal-cropper_592094772ff1b .input-group .input-group-addon {
        border-radius: 0;
        border-color: #d2d6de;
        background-color: #efefef;
        color: #555;
    }
    #cropper-modal-cropper_592094772ff1b .height-warning.has-success .input-group-addon,
    #cropper-modal-cropper_592094772ff1b .width-warning.has-success .input-group-addon{
        background-color: #00a65a;
        border-color: #00a65a;
        color: #fff;
    }
    #cropper-modal-cropper_592094772ff1b .height-warning.has-error .input-group-addon,
    #cropper-modal-cropper_592094772ff1b .width-warning.has-error .input-group-addon{
        background-color: #dd4b39;
        border-color: #dd4b39;
        color: #fff;
    }
</style></head>
<body class="with-side-menu control-panel control-panel-compact">

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
                        <div class="dropdown dropdown-notification notif">
                            <a href="#"
                               class="header-alarm dropdown-toggle active"
                               id="dd-notification"
                               data-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false">
                                <i class="font-icon-alarm"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif" aria-labelledby="dd-notification">
                                <div class="dropdown-menu-notif-header">
                                    Notifications
                                    <span class="label label-pill label-danger">4</span>
                                </div>
                                <div class="dropdown-menu-notif-list">
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <img src="img/photo-64-1.jpg" alt="">
                                        </div>
                                        <div class="dot"></div>
                                        <a href="#">Morgan</a> was bothering about something
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <img src="img/photo-64-2.jpg" alt="">
                                        </div>
                                        <div class="dot"></div>
                                        <a href="#">Lioneli</a> had commented on this <a href="#">Super Important Thing</a>
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <img src="img/photo-64-3.jpg" alt="">
                                        </div>
                                        <div class="dot"></div>
                                        <a href="#">Xavier</a> had commented on the <a href="#">Movie title</a>
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                    <div class="dropdown-menu-notif-item">
                                        <div class="photo">
                                            <img src="img/photo-64-4.jpg" alt="">
                                        </div>
                                        <a href="#">Lionely</a> wants to go to <a href="#">Cinema</a> with you to see <a href="#">This Movie</a>
                                        <div class="color-blue-grey-lighter">7 hours ago</div>
                                    </div>
                                </div>
                                <div class="dropdown-menu-notif-more">
                                    <a href="#">See more</a>
                                </div>
                            </div>
                        </div>
    
                        <div class="dropdown dropdown-notification messages">
                            <a href="#"
                               class="header-alarm dropdown-toggle active"
                               id="dd-messages"
                               data-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false">
                                <i class="font-icon-mail"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages" aria-labelledby="dd-messages">
                                <div class="dropdown-menu-messages-header">
                                    <ul class="nav" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active"
                                               data-toggle="tab"
                                               href="#tab-incoming"
                                               role="tab">
                                                Inbox
                                                <span class="label label-pill label-danger">8</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               data-toggle="tab"
                                               href="#tab-outgoing"
                                               role="tab">Outbox</a>
                                        </li>
                                    </ul>
                                    <!--<button type="button" class="create">
                                        <i class="font-icon font-icon-pen-square"></i>
                                    </button>-->
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-incoming" role="tabpanel">
                                        <div class="dropdown-menu-messages-list">
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
                                                <span class="mess-item-name">Tim Collins</span>
                                                <span class="mess-item-txt">Morgan was bothering about something!</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img src="img/ava.jpg" alt=""></span>
                                                <span class="mess-item-name">Christian Burton</span>
                                                <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
                                                <span class="mess-item-name">Tim Collins</span>
                                                <span class="mess-item-txt">Morgan was bothering about something!</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img src="img/ava.jpg" alt=""></span>
                                                <span class="mess-item-name">Christian Burton</span>
                                                <span class="mess-item-txt">Morgan was bothering about something...</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-outgoing" role="tabpanel">
                                        <div class="dropdown-menu-messages-list">
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img src="img/ava.jpg" alt=""></span>
                                                <span class="mess-item-name">Christian Burton</span>
                                                <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something...</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
                                                <span class="mess-item-name">Tim Collins</span>
                                                <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img src="img/ava.jpg" alt=""></span>
                                                <span class="mess-item-name">Christian Burtons</span>
                                                <span class="mess-item-txt">Morgan was bothering about something!</span>
                                            </a>
                                            <a href="#" class="mess-item">
                                                <span class="avatar-preview avatar-preview-32"><img src="img/photo-64-2.jpg" alt=""></span>
                                                <span class="mess-item-name">Tim Collins</span>
                                                <span class="mess-item-txt">Morgan was bothering about something!</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-menu-notif-more">
                                    <a href="#">See more</a>
                                </div>
                            </div>
                        </div>
       
                        <div class="dropdown user-menu">
                            <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="img/ava.jpg" alt="">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
                                <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
                                <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
                                <div class="dropdown-divider"></div>
                                <!--<a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>-->
                                
                                <form id="w1" action="/SistemasPage/backend/web/index.php?r=site%2Flogout" method="post" role="form">
<input type="hidden" name="_csrf-backend" value="ajdDR1otRk9aAwpyY3IFBllzdz4UFQE3PnR0ahxrcTUYR3IqHGUqIw==">                                <button type="submit" class="dropdown-item btn-link" name="login-button"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout (admin)</button>                                </form>                                
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
                 <a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><i class="font-icon font-icon-home"></i><span class="lbl">Inicio</span></a>            </li>
            <li class="brown">
                <a class="lbl" href="/SistemasPage/backend/web/index.php?r=admin%2Fnewsmanager"><i class="glyphicon glyphicon-tasks"></i><span class="lbl">Noticias</span></a> 
            </li>
            <li class="purple">
                <a class="lbl" href="/SistemasPage/backend/web/index.php?r=admin%2Fspecialitymanager"><i class="fa fa-file-text"></i><span class="lbl">Especialidades</span></a> 
            </li>
            <li class="green">
                <a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><i class="font-icon font-icon-wallet"></i><span class="lbl">Proyectos</span></a>                
            </li>
            <li class="red">
                <a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><i class="font-icon font-icon-case-2"></i><span class="lbl">Eventos</span></a> 
            </li>
            <li class="gold with-sub">
                <span>
                    <i class="font-icon font-icon-user"></i>
                    <span class="lbl">Portadas</span>
                </span>
                <ul>
                    <li><a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><span class="lbl">Eventos</span></a></li>
                    <li><a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><span class="lbl">Nosotros</span></a></li>
                    <li><a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><span class="lbl">Proyectos</span></a></li>
                    <li><a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><span class="lbl">Especialidades</span></a></li>
                    <li><a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><span class="lbl">Contacto</span></a></li>
                    <li><a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><span class="lbl">Eventos</span></a></a></li>
                    <li><a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><span class="lbl">Noticias</span></a></a></li>
                </ul>
            </li>
            
            <li class="blue-sky">
                <a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><i class="font-icon font-icon-contacts"></i><span class="lbl">Nosotros</span></a> 
            </li>
            <li class="aquamarine">
                <a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><i class="fa fa-pencil-square-o"></i><span class="lbl">Contactos</span></a> 
            </li>
           <li class="purple">
               <a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><i class="glyphicon glyphicon-tasks"></i><span class="lbl">Maestros</span></a> 
            </li>
            <li class="red">
                <a class="lbl" href="/SistemasPage/backend/web/index.php?r=site%2Findex"><i class="font-icon font-icon-del"></i><span class="lbl">Salir</span></a> 
            </li>
            
    </nav><!--.side-menu-->
    
    <div class="page-content">
                <h1>Subir Noticia</h1>
<form id="w0" action="/SistemasPage/backend/web/index.php?r=admin%2Fnews" method="post">
<input type="hidden" name="_csrf-backend" value="ajdDR1otRk9aAwpyY3IFBllzdz4UFQE3PnR0ahxrcTUYR3IqHGUqIw==">    <div class="form-group field-newsform-titulo required">
<label class="control-label" for="newsform-titulo">Titulo</label>
<input type="text" id="newsform-titulo" class="form-control" name="NewsForm[titulo]" aria-required="true">

<div class="help-block"></div>
</div>    <div class="form-group field-newsform-descripcion required">
<label class="control-label" for="newsform-descripcion">Descripcion</label>
<input type="text" id="newsform-descripcion" class="form-control" name="NewsForm[descripcion]" aria-required="true">

<div class="help-block"></div>
</div>    <div class="form-group field-newsform-link required">
<label class="control-label" for="newsform-link">Link</label>
<input type="text" id="newsform-link" class="form-control" name="NewsForm[link]" aria-required="true">

<div class="help-block"></div>
</div>    <div class="form-group field-newsform-_image">
<label class="control-label" for="newsform-_image">Image</label>


<div class="cropper-container clearfix">

    <input type="text" id="newsform-_image" name="NewsForm[_image]" title="" class="hidden">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cropper-modal-cropper_592094772ff1b" data-backdrop="static"><i class="fa fa-image"></i> Image</button>
                    <div class="cropper-result" id="cropper-result-cropper_592094772ff1b" style="margin-top: 10px; width: 100px; height: 99.152542372881px; border: 1px dotted #bfbfbf">
                    </div>
    </div>





<div class="help-block"></div>
</div>    <div class="form-group">
        <button type="submit" class="btn btn-primary">Guardar</button>    </div>
</form>    </div>
</div>



<div id="yii-debug-toolbar" data-url="/SistemasPage/backend/web/index.php?r=debug%2Fdefault%2Ftoolbar&amp;tag=59209476f38b4" style="display:none" class="yii-debug-toolbar-bottom"></div><style>
#yii-debug-toolbar-logo {
    position: fixed;
    right: 31px;
    bottom: 4px;
}

.yii-debug-toolbar {
    font: 11px Verdana, Arial, sans-serif;
    text-align: left;
    width: 96px;
    transition: width .3s ease;
    z-index: 1000000;
}

.yii-debug-toolbar_active {
    width: 100%;
}

.yii-debug-toolbar_position_top {
    margin: 0 0 20px 0;
    width: 100%;
}

.yii-debug-toolbar_position_bottom {
    position: fixed;
    right: 0;
    bottom: 0;
    margin: 0;
}

.yii-debug-toolbar__bar {
    position: relative;
    padding: 0;
    font: 11px Verdana, Arial, sans-serif;
    text-align: left;
    overflow: hidden;
    box-sizing: content-box;

    background: rgb(255, 255, 255);
    background: -moz-linear-gradient(top, rgb(255, 255, 255) 0%, rgb(247, 247, 247) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, rgb(255, 255, 255) 0%, rgb(247, 247, 247) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, rgb(255, 255, 255) 0%, rgb(247, 247, 247) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#f7f7f7', GradientType=0); /* IE6-9 */

    border: 1px solid rgba(0, 0, 0, 0.11);

    /* ensure debug toolbar text is displayed ltr even on rtl pages */
    direction: ltr;
}

.yii-debug-toolbar.yii-debug-toolbar_active:not(.yii-debug-toolbar_animating) .yii-debug-toolbar__bar {
    overflow: visible;
}
.yii-debug-toolbar:not(.yii-debug-toolbar_active) .yii-debug-toolbar__bar {
    height:40px;
}

.yii-debug-toolbar__bar:after {
    content: '';
    display: table;
    clear: both;
}

.yii-debug-toolbar__view {
    height: 0;
    overflow: hidden;
    background: white;
}

.yii-debug-toolbar__view iframe {
    margin: 0;
    padding: 0;
    padding-top: 10px;
    height: 100%;
    width: 100%;
    border: 0;
}

.yii-debug-toolbar_iframe_active .yii-debug-toolbar__view {
    height: 100%;
}

.yii-debug-toolbar_iframe_animating .yii-debug-toolbar__view {
    transition: height .3s ease;
}

.yii-debug-toolbar__block {
    float: left;
    margin: 0;
    border-right: 1px solid rgba(0, 0, 0, 0.11);
    padding: 4px 8px;
    line-height: 32px;
    white-space: nowrap;
}

.yii-debug-toolbar__block_active,
.yii-debug-toolbar__ajax:hover {
    background: rgb(247, 247, 247); /* Old browsers */
    background: -moz-linear-gradient(top, rgb(247, 247, 247) 0%, rgb(224, 224, 224) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, rgb(247, 247, 247) 0%, rgb(224, 224, 224) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, rgb(247, 247, 247) 0%, rgb(224, 224, 224) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f7f7f7', endColorstr='#e0e0e0', GradientType=0); /* IE6-9 */
}

.yii-debug-toolbar__block a {
    display: inline-block;
    text-decoration: none;
    color: black;
}

.yii-debug-toolbar__block img {
    vertical-align: middle;
}

.yii-debug-toolbar__label {
    display: inline-block;
    padding: 2px 4px;
    font-size: 12px;
    font-weight: normal;
    line-height: 14px;
    white-space: nowrap;
    vertical-align: baseline;
    color: #ffffff;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    background-color: #999999;
    -webkit-border-radius: 3px;
       -moz-border-radius: 3px;
            border-radius: 3px;
}

.yii-debug-toolbar__label:empty {
    display: none;
}

a.yii-debug-toolbar__label:hover,
a.yii-debug-toolbar__label:focus {
    color: #ffffff;
    text-decoration: none;
    cursor: pointer;
}

.yii-debug-toolbar__label_important,
.yii-debug-toolbar__label_error {
    background-color: #b94a48;
}

.yii-debug-toolbar__label_important[href] {
    background-color: #953b39;
}

.yii-debug-toolbar__label_warning,
.yii-debug-toolbar__badge_warning {
    background-color: #f89406;
}

.yii-debug-toolbar__label_warning[href] {
    background-color: #c67605;
}

.yii-debug-toolbar__label_success {
    background-color: #468847;
}

.yii-debug-toolbar__label_success[href] {
    background-color: #356635;
}

.yii-debug-toolbar__label_info {
    background-color: #3a87ad;
}

.yii-debug-toolbar__label_info[href] {
    background-color: #2d6987;
}

.yii-debug-toolbar__label_inverse,
.yii-debug-toolbar__badge_inverse {
    background-color: #333333;
}

.yii-debug-toolbar__label_inverse[href],
.yii-debug-toolbar__badge_inverse[href] {
    background-color: #1a1a1a;
}

.yii-debug-toolbar__title {
    background: rgb(247, 247, 247); /* Old browsers */
    background: -moz-linear-gradient(top, rgb(247, 247, 247) 0%, rgb(224, 224, 224) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, rgb(247, 247, 247) 0%, rgb(224, 224, 224) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, rgb(247, 247, 247) 0%, rgb(224, 224, 224) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f7f7f7', endColorstr='#e0e0e0', GradientType=0); /* IE6-9 */
}

.yii-debug-toolbar__block_last{ /* creates space for .yii-debug-toolbar__toggle, .yii-debug-toolbar__external */
    width: 80px;
    height: 40px;
    float: left;
}

.yii-debug-toolbar__toggle,
.yii-debug-toolbar__external {
    cursor: pointer;
    position: absolute;

    width: 30px;
    height: 30px;
    font-size: 25px;
    font-weight: 100;
    line-height: 28px;
    color: #ffffff;
    text-align: center;

    opacity: 0.5;
    filter: alpha(opacity=50);

    transition: opacity .3s ease;
}

.yii-debug-toolbar__toggle:hover,
.yii-debug-toolbar__toggle:focus,
.yii-debug-toolbar__external:hover,
.yii-debug-toolbar__external:focus {
    color: #ffffff;
    text-decoration: none;
    opacity: 0.9;
    filter: alpha(opacity=90);
}

.yii-debug-toolbar__toggle-icon,
.yii-debug-toolbar__external-icon {
    display: inline-block;

    background-position: 50% 50%;
    background-repeat: no-repeat;
}

.yii-debug-toolbar__toggle {
    right: 10px;
    bottom: 4px;
}

.yii-debug-toolbar__toggle-icon {
    padding: 7px 0;
    width: 10px;
    height: 16px;
    background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNSIgaGVpZ2h0PSIxNSIgdmlld0JveD0iMCAwIDUwIDUwIj48cGF0aCBmaWxsPSIjNDQ0IiBkPSJNMTUuNTYzIDQwLjgzNmEuOTk3Ljk5NyAwIDAgMCAxLjQxNCAwbDE1LTE1YTEgMSAwIDAgMCAwLTEuNDE0bC0xNS0xNWExIDEgMCAwIDAtMS40MTQgMS40MTRMMjkuODU2IDI1LjEzIDE1LjU2MyAzOS40MmExIDEgMCAwIDAgMCAxLjQxNHoiLz48L3N2Zz4=');
    transition: -webkit-transform .3s ease-out;
    transition: transform .3s ease-out;
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
}

.yii-debug-toolbar_active .yii-debug-toolbar__toggle-icon {
    -webkit-transform: rotate(0);
    transform: rotate(0);
}

.yii-debug-toolbar_iframe_active .yii-debug-toolbar__toggle-icon {
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
}

.yii-debug-toolbar__external {
    display: none;
    right: 50px;
    bottom: 4px;
}

.yii-debug-toolbar_iframe_active .yii-debug-toolbar__external {
    display: block;
}

.yii-debug-toolbar__external-icon {
    padding: 8px 0;
    width: 14px;
    height: 14px;
    background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNSIgaGVpZ2h0PSIxNSIgdmlld0JveD0iMCAwIDUwIDUwIj48cGF0aCBmaWxsPSIjNDQ0IiBkPSJNMzkuNjQyIDkuNzIyYTEuMDEgMS4wMSAwIDAgMC0uMzgyLS4wNzdIMjguMTAzYTEgMSAwIDAgMCAwIDJoOC43NDNMMjEuNyAyNi43OWExIDEgMCAwIDAgMS40MTQgMS40MTVMMzguMjYgMTMuMDZ2OC43NDNhMSAxIDAgMCAwIDIgMFYxMC42NDZhMS4wMDUgMS4wMDUgMCAwIDAtLjYxOC0uOTI0eiIvPjxwYXRoIGQ9Ik0zOS4yNiAyNy45ODVhMSAxIDAgMCAwLTEgMXYxMC42NmgtMjh2LTI4aDEwLjY4M2ExIDEgMCAwIDAgMC0ySDkuMjZhMSAxIDAgMCAwLTEgMXYzMGExIDEgMCAwIDAgMSAxaDMwYTEgMSAwIDAgMCAxLTF2LTExLjY2YTEgMSAwIDAgMC0xLTF6Ii8+PC9zdmc+');
}

.yii-debug-toolbar__ajax {
    position: relative;
}

.yii-debug-toolbar__ajax:hover .yii-debug-toolbar__ajax_info,
.yii-debug-toolbar__ajax:focus .yii-debug-toolbar__ajax_info {
    visibility: visible;
}
.yii-debug-toolbar__ajax_info {
    visibility: hidden;
    transition: visibility .2s linear;
    background-color: white;
    box-shadow: inset 0 -10px 10px -10px #e1e1e1;
    position: absolute;
    bottom: 40px;
    left: -1px;
    padding: 10px;
    max-width: 480px;
    max-height: 480px;
    word-wrap: break-word;
    overflow: hidden;
    overflow-y: auto;
    box-sizing: border-box;
    border: 1px solid rgba(0, 0, 0, 0.11);
    z-index: 1000001;
}
.yii-debug-toolbar__ajax a {
    color: #337ab7;
}
.yii-debug-toolbar__ajax table {
    width: 100%;
    table-layout: auto;
    border-spacing: 0;
    border-collapse: collapse;
}
.yii-debug-toolbar__ajax table td {
    padding: 4px;
    font-size: 12px;
    line-height: normal;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
.yii-debug-toolbar__ajax table th {
    padding: 4px;
    font-size: 11px;
    line-height: normal;
    vertical-align: bottom;
    border-bottom: 2px solid #ddd;
}
.yii-debug-toolbar__ajax_request_status {
    color: white;
    padding: 2px 5px;
}
.yii-debug-toolbar__ajax_request_url {
    max-width: 170px;
    overflow: hidden;
    text-overflow: ellipsis;
}</style><script>(function () {
    'use strict';

    var findToolbar = function () {
            return document.querySelector('#yii-debug-toolbar');
        },
        ajax = function (url, settings) {
            var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            settings = settings || {};
            xhr.open(settings.method || 'GET', url, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.setRequestHeader('Accept', 'text/html');
            xhr.onreadystatechange = function (state) {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200 && settings.success) {
                        settings.success(xhr);
                    } else if (xhr.status != 200 && settings.error) {
                        settings.error(xhr);
                    }
                }
            };
            xhr.send(settings.data || '');
        },
        url,
        div,
        toolbarEl = findToolbar(),
        toolbarAnimatingClass = 'yii-debug-toolbar_animating',
        barSelector = '.yii-debug-toolbar__bar',
        viewSelector = '.yii-debug-toolbar__view',
        blockSelector = '.yii-debug-toolbar__block',
        toggleSelector = '.yii-debug-toolbar__toggle',
        externalSelector = '.yii-debug-toolbar__external',

        CACHE_KEY = 'yii-debug-toolbar',
        ACTIVE_STATE = 'active',

        animationTime = 300,

        activeClass = 'yii-debug-toolbar_active',
        iframeActiveClass = 'yii-debug-toolbar_iframe_active',
        iframeAnimatingClass = 'yii-debug-toolbar_iframe_animating',
        titleClass = 'yii-debug-toolbar__title',
        blockClass = 'yii-debug-toolbar__block',
        blockActiveClass = 'yii-debug-toolbar__block_active',
        requestStack = [];

    if (toolbarEl) {
        url = toolbarEl.getAttribute('data-url');

        ajax(url, {
            success: function (xhr) {
                div = document.createElement('div');
                div.innerHTML = xhr.responseText;

                toolbarEl.parentNode && toolbarEl.parentNode.replaceChild(div, toolbarEl);

                showToolbar(findToolbar());
            },
            error: function (xhr) {
                toolbarEl.innerHTML = xhr.responseText;
            }
        });
    }

    function showToolbar(toolbarEl) {
        var barEl = toolbarEl.querySelector(barSelector),
            viewEl = toolbarEl.querySelector(viewSelector),
            toggleEl = toolbarEl.querySelector(toggleSelector),
            externalEl = toolbarEl.querySelector(externalSelector),
            blockEls = barEl.querySelectorAll(blockSelector),
            iframeEl = viewEl.querySelector('iframe'),
            iframeHeight = function () {
                return (window.innerHeight * 0.7) + 'px';
            },
            isIframeActive = function () {
                return toolbarEl.classList.contains(iframeActiveClass);
            },
            showIframe = function (href) {
                toolbarEl.classList.add(iframeAnimatingClass);
                toolbarEl.classList.add(iframeActiveClass);

                iframeEl.src = externalEl.href = href;
                viewEl.style.height = iframeHeight();
                setTimeout(function() {
                    toolbarEl.classList.remove(iframeAnimatingClass);
                }, animationTime);
            },
            hideIframe = function () {
                toolbarEl.classList.add(iframeAnimatingClass);
                toolbarEl.classList.remove(iframeActiveClass);
                removeActiveBlocksCls();

                externalEl.href = '#';
                viewEl.style.height = '';
                setTimeout(function() {
                    toolbarEl.classList.remove(iframeAnimatingClass);
                }, animationTime);
            },
            removeActiveBlocksCls = function () {
                [].forEach.call(blockEls, function (el) {
                    el.classList.remove(blockActiveClass);
                });
            },
            toggleToolbarClass = function (className) {
                toolbarEl.classList.add(toolbarAnimatingClass);
                if (toolbarEl.classList.contains(className)) {
                    toolbarEl.classList.remove(className);
                } else {
                    toolbarEl.classList.add(className);
                }
                setTimeout(function () {
                    toolbarEl.classList.remove(toolbarAnimatingClass);
                }, animationTime);
            },
            toggleStorageState = function (key, value) {
                if (window.localStorage) {
                    var item = localStorage.getItem(key);

                    if (item) {
                        localStorage.removeItem(key);
                    } else {
                        localStorage.setItem(key, value);
                    }
                }
            },
            restoreStorageState = function (key) {
                if (window.localStorage) {
                    return localStorage.getItem(key);
                }
            },
            togglePosition = function () {
                if (isIframeActive()) {
                    hideIframe();
                } else {
                    toggleToolbarClass(activeClass);
                    toggleStorageState(CACHE_KEY, ACTIVE_STATE);
                }
            };

        toolbarEl.style.display = 'block';

        if (restoreStorageState(CACHE_KEY) == ACTIVE_STATE) {
            toolbarEl.classList.add(activeClass);
        }

        window.onresize = function () {
            if (toolbarEl.classList.contains(iframeActiveClass)) {
                viewEl.style.height = iframeHeight();
            }
        };

        barEl.onclick = function (e) {
            var target = e.target,
                block = findAncestor(target, blockClass);

            if (block && !block.classList.contains(titleClass)
                && e.which !== 2 && !e.ctrlKey // not mouse wheel and not ctrl+click
            ) {
                while (target !== this) {
                    if (target.href) {
                        removeActiveBlocksCls();
                        block.classList.add(blockActiveClass);
                        showIframe(target.href);
                    }
                    target = target.parentNode;
                }

                e.preventDefault();
            }
        };

        toggleEl.onclick = togglePosition;
    }

    function findAncestor(el, cls) {
        while ((el = el.parentElement) && !el.classList.contains(cls));
        return el;
    }

    function renderAjaxRequests() {
        var requestCounter = document.getElementsByClassName('yii-debug-toolbar__ajax_counter');
        if (!requestCounter.length) {
            return;
        }
        var ajaxToolbarPanel = document.querySelector('.yii-debug-toolbar__ajax');
        var tbodies = document.getElementsByClassName('yii-debug-toolbar__ajax_requests');
        var state = 'ok';
        if (tbodies.length) {
            var tbody = tbodies[0];
            var rows = document.createDocumentFragment();
            if (requestStack.length) {
                var firstItem = requestStack.length > 20 ? requestStack.length - 20 : 0;
                for (var i = firstItem; i < requestStack.length; i++) {
                    var request = requestStack[i];
                    var row = document.createElement('tr');
                    rows.appendChild(row);

                    var methodCell = document.createElement('td');
                    methodCell.innerHTML = request.method;
                    row.appendChild(methodCell);

                    var statusCodeCell = document.createElement('td');
                    var statusCode = document.createElement('span');
                    if (request.statusCode < 300) {
                        statusCode.setAttribute('class', 'yii-debug-toolbar__ajax_request_status yii-debug-toolbar__label_success');
                    } else if (request.statusCode < 400) {
                        statusCode.setAttribute('class', 'yii-debug-toolbar__ajax_request_status yii-debug-toolbar__label_warning');
                    } else {
                        statusCode.setAttribute('class', 'yii-debug-toolbar__ajax_request_status yii-debug-toolbar__label_error');
                    }
                    statusCode.textContent = request.statusCode || '-';
                    statusCodeCell.appendChild(statusCode);
                    row.appendChild(statusCodeCell);

                    var pathCell = document.createElement('td');
                    pathCell.className = 'yii-debug-toolbar__ajax_request_url';
                    pathCell.innerHTML = request.url;
                    pathCell.setAttribute('title', request.url);
                    row.appendChild(pathCell);

                    var durationCell = document.createElement('td');
                    durationCell.className = 'yii-debug-toolbar__ajax_request_duration';
                    if (request.duration) {
                        durationCell.innerText = request.duration + " ms";
                    } else {
                        durationCell.innerText = '-';
                    }
                    row.appendChild(durationCell);
                    row.appendChild(document.createTextNode(' '));

                    var profilerCell = document.createElement('td');
                    if (request.profilerUrl) {
                        var profilerLink = document.createElement('a');
                        profilerLink.setAttribute('href', request.profilerUrl);
                        profilerLink.innerText = request.profile;
                        profilerCell.appendChild(profilerLink);
                    } else {
                        profilerCell.innerText = 'n/a';
                    }
                    row.appendChild(profilerCell);

                    if (request.error) {
                        if (state !== "loading" && i > requestStack.length - 4) {
                            state = 'error';
                        }
                    } else if (request.loading) {
                        state = 'loading'
                    }
                    row.className = 'yii-debug-toolbar__ajax_request';
                }
                while (tbody.firstChild) {
                    tbody.removeChild(tbody.firstChild);
                }
                tbody.appendChild(rows);
            }
            ajaxToolbarPanel.style.display = 'block';
        }
        requestCounter[0].innerText = requestStack.length;
        var className = 'yii-debug-toolbar__label yii-debug-toolbar__ajax_counter';
        if (state == 'ok') {
            className += ' yii-debug-toolbar__label_success';
        } else if (state == 'error') {
            className += ' yii-debug-toolbar__label_error';
        }
        requestCounter[0].className = className;
    };

    var proxied = XMLHttpRequest.prototype.open;

    XMLHttpRequest.prototype.open = function (method, url, async, user, pass) {
        var self = this;
        /* prevent logging AJAX calls to static and inline files, like templates */
        if (url.substr(0, 1) === '/' && !url.match(new RegExp("{{ excluded_ajax_paths }}"))) {
            var stackElement = {
                loading: true,
                error: false,
                url: url,
                method: method,
                start: new Date()
            };
            requestStack.push(stackElement);
            this.addEventListener("readystatechange", function () {
                if (self.readyState == 4) {
                    stackElement.duration = self.getResponseHeader("X-Debug-Duration") || new Date() - stackElement.start;
                    stackElement.loading = false;
                    stackElement.statusCode = self.status;
                    stackElement.error = self.status < 200 || self.status >= 400;
                    stackElement.profile = self.getResponseHeader("X-Debug-Tag");
                    stackElement.profilerUrl = self.getResponseHeader("X-Debug-Link");
                    renderAjaxRequests();
                }
            }, false);
            renderAjaxRequests();
        }
        proxied.apply(this, Array.prototype.slice.call(arguments));
    };

})();</script><script src="/SistemasPage/backend/web/assets/32e05e7/jquery.js"></script>
<script src="/SistemasPage/backend/web/assets/2a2af2fd/yii.js"></script>
<script src="/SistemasPage/backend/web/assets/2a2af2fd/yii.validation.js"></script>
<script src="/SistemasPage/backend/web/assets/f5086e32/js/bootstrap.js"></script>
<script src="/SistemasPage/backend/web/assets/415df95a/cropper.js"></script>
<script src="/SistemasPage/backend/web/assets/2a2af2fd/yii.activeForm.js"></script>
<script src="/SistemasPage/backend/web/js/lib/tether/tether.min.js"></script>
<script src="/SistemasPage/backend/web/js/lib/bootstrap/bootstrap.min.js"></script> 
<script src="/SistemasPage/backend/web/js/plugins.js"></script>
<script src="/SistemasPage/backend/web/js/lib/jqueryui/jquery-ui.min.js"></script>
<script src="/SistemasPage/backend/web/js/lib/lobipanel/lobipanel.min.js"></script>
<script src="/SistemasPage/backend/web/js/lib/match-height/jquery.matchHeight.min.js"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="/SistemasPage/backend/web/js/app.js"></script>
<script type="text/javascript">
    $('body').prepend('<div class="modal fade" tabindex="-1" role="dialog" id="cropper-modal-cropper_592094772ff1b"><div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="modalLabel-cropper_592094772ff1b">Asitente de recorte de imágenes</h4></div><div class="modal-body"><div><img id="cropper-image-cropper_592094772ff1b" src="" alt=""></div></div><div class="modal-footer"><div class="row" style="margin-bottom: 10px"><div class="col-xs-12 text-left"><div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Doble click: cambiar entre "mover imagen" o "redibujar area"</div></div><div class="col-sm-3"><div class="input-group input-group-sm width-warning"><label class="input-group-addon" for="dataWidth-cropper_592094772ff1b">Ancho (236px)</label><input type="text" class="form-control" id="dataWidth-cropper_592094772ff1b" placeholder="width"><span class="input-group-addon">px</span></div></div><div class="col-sm-3"><div class="input-group input-group-sm height-warning"><label class="input-group-addon" for="dataHeight-cropper_592094772ff1b">Alto (234px)</label><input type="text" class="form-control" id="dataHeight-cropper_592094772ff1b" placeholder="height"><span class="input-group-addon">px</span></div></div><div class="col-sm-3"><div class="input-group input-group-sm"><label class="input-group-addon" for="dataX-cropper_592094772ff1b">X</label><input type="text" class="form-control" id="dataX-cropper_592094772ff1b" placeholder="x"><span class="input-group-addon">px</span></div></div><div class="col-sm-3"><div class="input-group input-group-sm"><label class="input-group-addon" for="dataY-cropper_592094772ff1b">Y</label><input type="text" class="form-control" id="dataY-cropper_592094772ff1b" placeholder="y"><span class="input-group-addon">px</span></div></div></div><div class="pull-left"><span class="btn btn-primary btn-file"><i class="fa fa-image"></i> Buscar<input type="file" id="cropper-input-cropper_592094772ff1b" title="Buscar" accept="image/*"></span>&nbsp;<div class="btn-group"><button type="button" class="btn btn-primary zoom-in"><span class="fa fa-search-plus"></span></button><button type="button" class="btn btn-primary zoom-out"><span class="fa fa-search-minus"></span></button></div>&nbsp;<div class="btn-group"><button type="button" class="btn btn-primary rotate-left"><span class="fa fa-rotate-left"></span></button><button type="button" class="btn btn-primary rotate-right"><span class="fa fa-rotate-right"></span></button><button type="button" class="btn btn-primary flip-horizontal"><span class="fa fa-arrows-h"></span></button><button type="button" class="btn btn-primary flip-vertical"><span class="fa fa-arrows-v"></span></button></div>&nbsp;<div class="btn-group"><button type="button" class="btn btn-primary move-left"><span class="fa fa-arrow-left"></span></button><button type="button" class="btn btn-primary move-right"><span class="fa fa-arrow-right"></span></button><button type="button" class="btn btn-primary move-up"><span class="fa fa-arrow-up"></span></button><button type="button" class="btn btn-primary move-down"><span class="fa fa-arrow-down"></span></button></div></div><button type="button" id="crop-button-cropper_592094772ff1b" class="btn btn-success"><i class="fa fa-crop"></i> Cortar</button><button type="button" id="close-button-cropper_592094772ff1b" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-crop"></i> Cortar & Cerrar</button></div></div></div></div>');

    var options_cropper_592094772ff1b = {
        croppable: false,
        croppedCanvas: '',
        
        element: {
            modal: $('#cropper-modal-cropper_592094772ff1b'),
            image: $('#cropper-image-cropper_592094772ff1b'),
            _image: document.getElementById('cropper-image-cropper_592094772ff1b'),
            result: $('#cropper-result-cropper_592094772ff1b')        
        },
        
        input: {
            model: $('#newsform-_image'),
            crop: $('#cropper-input-cropper_592094772ff1b')
        },
        
        button: {
            crop: $('#crop-button-cropper_592094772ff1b'),
            close: $('#close-button-cropper_592094772ff1b'),
        },
        
        data: {
            cropWidth: 236,
            cropHeight: 234,
            scaleX: 1,
            scaleY: 1,
            width: '',
            height: '',
            X: '',
            Y: ''
        },
     
        inputData: {
            width: $('#dataWidth-cropper_592094772ff1b'),
            height: $('#dataHeight-cropper_592094772ff1b'),
            X: $('#dataX-cropper_592094772ff1b'),
            Y: $('#dataY-cropper_592094772ff1b')
        }
    };
    
    
    options_cropper_592094772ff1b.input.crop.change(function(event) {
        
        
        // cropper reset
        options_cropper_592094772ff1b.croppable = false;
        options_cropper_592094772ff1b.element.image.cropper('destroy');        
        options_cropper_592094772ff1b.element.modal.find('.width-warning, .height-warning').removeClass('has-success').removeClass('has-error');
        
        
        // image loading        
        if (typeof event.target.files[0] === 'undefined') {
            options_cropper_592094772ff1b.element._image.src = "";
            return;
        }               
        options_cropper_592094772ff1b.element._image.src = URL.createObjectURL(event.target.files[0]);
        
        
        // cropper start
        options_cropper_592094772ff1b.element.image.cropper({
            aspectRatio: 1.008547008547,
            viewMode: 2,
            autoCropArea: 0.5,     
            crop: function (e) {

                options_cropper_592094772ff1b.data.width = Math.round(e.width);
                options_cropper_592094772ff1b.data.height = Math.round(e.height);
                options_cropper_592094772ff1b.data.X = e.scaleX;
                options_cropper_592094772ff1b.data.Y = e.scaleY;                                               
                
                options_cropper_592094772ff1b.inputData.width.val(Math.round(e.width));
                options_cropper_592094772ff1b.inputData.height.val(Math.round(e.height));
                options_cropper_592094772ff1b.inputData.X.val(Math.round(e.x));
                options_cropper_592094772ff1b.inputData.Y.val(Math.round(e.y));                
                
                
                if (options_cropper_592094772ff1b.data.width < options_cropper_592094772ff1b.data.cropWidth) {
                    options_cropper_592094772ff1b.element.modal.find('.width-warning').removeClass('has-success').addClass('has-error');
                } else {
                    options_cropper_592094772ff1b.element.modal.find('.width-warning').removeClass('has-error').addClass('has-success');
                }
                
                if (options_cropper_592094772ff1b.data.height < options_cropper_592094772ff1b.data.cropHeight) {
                    options_cropper_592094772ff1b.element.modal.find('.height-warning').removeClass('has-success').addClass('has-error');                   
                } else {
                    options_cropper_592094772ff1b.element.modal.find('.height-warning').removeClass('has-error').addClass('has-success');                     
                }
            }, 
            
            built: function () {
                options_cropper_592094772ff1b.croppable = true;               
            }
        });        
    });
    
    
    
    
    function setCropcropper_592094772ff1b() {        
        if (!options_cropper_592094772ff1b.croppable) {
            return;
        }        
        options_cropper_592094772ff1b.croppedCanvas = options_cropper_592094772ff1b.element.image.cropper('getCroppedCanvas', {
            width: options_cropper_592094772ff1b.data.cropWidth,
            height: options_cropper_592094772ff1b.data.cropHeight
        });
        options_cropper_592094772ff1b.element.result.html('<img src="' + options_cropper_592094772ff1b.croppedCanvas.toDataURL() + '">');
        
        options_cropper_592094772ff1b.input.model.attr('type', 'text');
        options_cropper_592094772ff1b.input.model.val(options_cropper_592094772ff1b.croppedCanvas.toDataURL());
    }
    

    options_cropper_592094772ff1b.button.crop.click(function() { setCropcropper_592094772ff1b(); });
    options_cropper_592094772ff1b.button.close.click(function() { setCropcropper_592094772ff1b(); });
    $('[data-target="#cropper-modal-cropper_592094772ff1b"]').click(function() {
        var src_cropper_592094772ff1b = $('#cropper-modal-cropper_592094772ff1b').find('.modal-body').find('img').attr('src');        
        if (src_cropper_592094772ff1b === '') {
            options_cropper_592094772ff1b.input.crop.click();
        }
    });
    
  
    options_cropper_592094772ff1b.element.modal.find('.move-left').click(function() { 
        if (!options_cropper_592094772ff1b.croppable) return;
        options_cropper_592094772ff1b.element.image.cropper('move', -10, 0);
    });
    options_cropper_592094772ff1b.element.modal.find('.move-right').click(function() {
        if (!options_cropper_592094772ff1b.croppable) return;
        options_cropper_592094772ff1b.element.image.cropper('move', 10, 0);     
    });
    options_cropper_592094772ff1b.element.modal.find('.move-up').click(function() { 
        if (!options_cropper_592094772ff1b.croppable) return;
        options_cropper_592094772ff1b.element.image.cropper('move', 0, -10);      
    });
    options_cropper_592094772ff1b.element.modal.find('.move-down').click(function() { 
        if (!options_cropper_592094772ff1b.croppable) return;
        options_cropper_592094772ff1b.element.image.cropper('move', 0, 10);
    });
    options_cropper_592094772ff1b.element.modal.find('.zoom-in').click(function() {
        if (!options_cropper_592094772ff1b.croppable) return;
        options_cropper_592094772ff1b.element.image.cropper('zoom', 0.1); 
    });
    options_cropper_592094772ff1b.element.modal.find('.zoom-out').click(function() {
        if (!options_cropper_592094772ff1b.croppable) return;
        options_cropper_592094772ff1b.element.image.cropper('zoom', -0.1);         
    });
    options_cropper_592094772ff1b.element.modal.find('.rotate-left').click(function() { 
        if (!options_cropper_592094772ff1b.croppable) return;
        options_cropper_592094772ff1b.element.image.cropper('rotate', -15);
    });
    options_cropper_592094772ff1b.element.modal.find('.rotate-right').click(function() { 
        if (!options_cropper_592094772ff1b.croppable) return;
        options_cropper_592094772ff1b.element.image.cropper('rotate', 15); 
    });
    options_cropper_592094772ff1b.element.modal.find('.flip-horizontal').click(function() { 
        if (!options_cropper_592094772ff1b.croppable) return;
        options_cropper_592094772ff1b.data.scaleX = -1 * options_cropper_592094772ff1b.data.scaleX;        
        options_cropper_592094772ff1b.element.image.cropper('scaleX', options_cropper_592094772ff1b.data.scaleX);
    });
    options_cropper_592094772ff1b.element.modal.find('.flip-vertical').click(function() { 
        if (!options_cropper_592094772ff1b.croppable) return;
        options_cropper_592094772ff1b.data.scaleY = -1 * options_cropper_592094772ff1b.data.scaleY;
        options_cropper_592094772ff1b.element.image.cropper('scaleY', options_cropper_592094772ff1b.data.scaleY);
    });
    </script>
<script type="text/javascript">jQuery(document).ready(function () {
jQuery('#w0').yiiActiveForm([{"id":"newsform-titulo","name":"titulo","container":".field-newsform-titulo","input":"#newsform-titulo","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Titulo no puede estar vacío."});}},{"id":"newsform-descripcion","name":"descripcion","container":".field-newsform-descripcion","input":"#newsform-descripcion","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Descripcion no puede estar vacío."});}},{"id":"newsform-link","name":"link","container":".field-newsform-link","input":"#newsform-link","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Link no puede estar vacío."});}}], []);
jQuery('#w1').yiiActiveForm([], []);
});</script></body>
</html>
