<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\HtmlPurifier;
$this->title = 'Home';


?>
<div class="site-index">
                    <div class="mobile-menu-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mobile-menu">
                                        <nav id="dropdown">
                                            <ul>
                                                <li><a href="index.html">HOME</a>
                                                    <ul>
                                                        <li><a href="index.html">Slider Style 1</a></li>
                                                        <li><a href="index-2.html">Slider Style 2</a></li>
                                                        <li><a href="index-3.html">Background Image</a></li>
                                                        <li><a href="index-4.html">Image Overlay Light</a></li>
                                                        <li><a href="index-5.html">Image Overlay Dark</a></li>
                                                        <li><a href="index-6.html">Menu With Slider</a></li>
                                                        <li><a href="index-7.html">Menu With Image</a></li>
                                                        <li><a href="index-8.html">Menu With Overlay</a></li>
                                                        <li><a href="index-9.html">Video Background</a></li>
                                                        <li><a href="index-10.html">Fixed Image</a></li>
                                                        <li><a href="index-11.html">Overlay Fixed Image</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="courses.html">Courses</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="courses-details.html">Courses Details</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="shop-grid.html">Shop</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="product-details.html">Product Details</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="event.html">Event</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="event-details.html">Event Details</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="index.html">Shortcode</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="shortcode-course.html">Courses</a></li>
                                                        <li><a href="shortcode-event.html">Event</a></li>
                                                        <li><a href="shortcode-latest-news.html">Latest News</a></li>
                                                        <li><a href="shortcode-product.html">Product</a></li>
                                                        <li><a href="shortcode-testimonial.html">Testimonial</a></li>
                                                        <li><a href="shortcode-contact-form.html">Contact Form</a></li>
                                                        <li><a href="shortcode-map.html">Map</a></li>
                                                        <li><a href="shortcode-facts.html">Facts</a></li>
                                                        <li><a href="image-gallery.html">Image Gallery</a></li>
                                                        <li><a href="video-gallery.html">Video Gallery</a></li>
                                                        <li><a href="shortcode-alerts.html">Alerts</a></li>
                                                        <li><a href="shortcode-button.html">Button</a></li>
                                                        <li><a href="shortcode-breadcrumbs.html">Breadcrumb</a></li>
                                                        <li><a href="shortcode-dropdown.html">Dropdown</a></li>
                                                        <li><a href="shortcode-pagination.html">Pagination</a></li>
                                                        <li><a href="shortcode-progressbar.html">Progressbar</a></li>
                                                        <li><a href="text-animation-1.html">Text Animation 1</a></li>
                                                        <li><a href="text-animation-2.html">Text Animation 2</a></li>
                                                        <li><a href="text-animation-3.html">Text Animation 3</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="latest-news.html">Latest News</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="news-details.html">News Details</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="index.html">Features</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="#">Sliders</a>
                                                            <ul>
                                                                <li><a href="slider-style-1.html">Slider Style 1</a></li>
                                                                <li><a href="slider-style-2.html">Slider Style 2</a></li>
                                                                <li><a href="slider-style-3.html">Slider Style 3</a></li>
                                                                <li><a href="background-image.html">Image Background </a></li>
                                                                <li><a href="image-overlay-light.html">Overlay Light </a></li>
                                                                <li><a href="image-overlay-dark.html">Overlay Dark </a></li>
                                                                <li><a href="video-background.html">Video Background </a></li>
                                                                <li><a href="fixed-image.html">Fixed Image</a></li>
                                                                <li><a href="overlay-fixed-image.html">Overlay Fixed Image</a></li>
                                                                <li><a href="text-animation-1.html">Text Animation 1 </a></li>
                                                                <li><a href="text-animation-2.html">Text Animation 2 </a></li>
                                                                <li><a href="text-animation-3.html">Text Animation 3 </a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Menu Style</a>
                                                            <ul>
                                                                <li><a href="theme-menu-1.html">Theme Menu 1</a></li>
                                                                <li><a href="theme-menu-2.html">Theme Menu 2</a></li>
                                                                <li><a href="theme-menu-3.html">Theme Menu 3</a></li>
                                                                <li><a href="without-top-bar.html">Without Top Bar</a></li>
                                                                <li><a href="menu-center.html">Menu Center</a></li>
                                                                <li><a href="menu-transparent.html">Transparent</a></li>
                                                                <li><a href="menu-semi-transparent.html">Semi Transparent</a></li>
                                                                <li><a href="menu-dark.html">Menu Dark</a></li>
                                                                <li><a href="borderd-menu.html">Menu Border</a></li>
                                                                <li><a href="menu-top-border.html">Top Border Hover</a></li>
                                                                <li><a href="menu-sticky.html">Menu Sticky</a></li>
                                                                <li><a href="menu-non-sticky.html">Menu Non Sticky</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Page Title</a>
                                                            <ul>
                                                                <li><a href="breadcrumb-dark.html">Title Dark</a></li>
                                                                <li><a href="breadcrumb-fixed.html">Title Fixed</a></li>
                                                                <li><a href="breadcrumb-image.html">Title Image</a></li>
                                                                <li><a href="breadcrumb-transparent.html">Title Transparent</a></li>
                                                                <li><a href="breadcrumb-left.html">Title Left</a></li>
                                                                <li><a href="breadcrumb-right.html">Title Right</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Footer Style</a>
                                                            <ul>
                                                                <li><a href="footer-style-1.html">Footer Style 1</a></li>
                                                                <li><a href="footer-style-2.html">Footer Style 2</a></li>
                                                                <li><a href="footer-style-3.html">Footer Style 3</a></li>
                                                                <li><a href="footer-style-4.html">Footer Style 4</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact.html">Contact us</a></li>
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
                 <!--Slider Area Start-->
                <div class="slider-area slider-two">
                    <div class="preview-2">
                        <div id="nivoslider" class="slides">   
                            <?php $i = 1; foreach($slide as $slide_1): ?>
                                <img src='img/slider/<?= $slide_1->Imagen ?>' alt='' title='#slider-1-caption<?= $i ?>'/> 
                            <?php $i++; endforeach; ?>
                            <!--<img src="img/slider/1.jpg" alt="" title="#slider-1-caption1"/>-->
                            <!--<img src="img/slider/4.jpg" alt="" title="#slider-1-caption2"/>-->
                        </div> 
                        <?php $i = 1; foreach($slide as $slide_1): ?>
                        <div id="slider-1-caption<?= $i ?>" class="nivo-html-caption nivo-caption">
                            <div class="banner-content slider-1">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-content-wrapper">
                                                <div class="text-content">
                                                    <h1 class="title1"><?= $slide_1->Titulo ?></h1>
                                                    <p class="sub-title hidden-sm hidden-xs"> <?= $slide_1->Descripcion ?></p>
                                                    <div class="banner-readmore">
                                                        
                                                        <?= Html::a("Ver Cursos", ['site/courses'], ['class' => 'button-default bg-blue']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <?php $i++; endforeach; ?>
<!--                        <div id="slider-1-caption2" class="nivo-html-caption nivo-caption">
                            <div class="banner-content slider-2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-content-wrapper">
                                                <div class="text-content slide-2">
                                                    <h1 class="title1">Education Needs<br>
                                                    Complete Solution</h1>
                                                    <p class="sub-title hidden-sm hidden-xs"> There are many variations of passages of Lorem Ipsum available, but the majority have<br>
                                                    suffered alteration in some form, by injected humour, or randomised words which<br>
                                                    don't look even slightly believable.</p>
                                                    <div class="banner-readmore">
                                                        <a class="button-default bg-blue" href="#">View Courses</a>                 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                    </div>
                </div>
                <!--End of Slider Area-->
                <!--About Area Start--> 
                <div class="about-area" style="background-image: url('img/banner/<?= $portada->imagen ?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="about-container">
                                    <h3><?=$inicio->tituloPortada?></h3>
                                    <?=$inicio->descripcionPortada?>
                                    
                                    <?= Html::a("Conócenos", ['site/about'], ['class' => 'button-default']);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of About Area-->
                <!--Course Area Start-->
                <div class="course-area section-padding bg-white">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title-wrapper">
                                    <div class="section-title">
                                        <h3>ESPECIALIDADES</h3>
                                        <p>En los últimos semestres de la carrera podrás especializarte en los que más te gusta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <?php foreach ($especialidades as $especialidad): ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="single-item">
                                    <div class="single-item-image overlay-effect">
                                        
                                        <?= Html::a("<img src='img/course/".Html::encode($especialidad->imagen)."' alt=''>", ['site/coursesdetail', 'id' => $especialidad->idEspecialidades]);?>
                                    </div>
                                    <div class="single-item-text">
                                       
                                        <h4><?= Html::a(Html::encode($especialidad->Titulo), ['site/coursesdetail', 'id' => $especialidad->idEspecialidades]);?></h4>
                                        <div class="single-item-text-info">
                                            <span>Por: <span><?= Html::encode($especialidad->maestro) ?></span></span>
                                        </div>
                                        <?= HtmlPurifier::process($especialidad->Descripcion) ?>
                                        <div class="single-item-content">
                                           <div class="single-item-comment-view">
                                               <span><i class="zmdi zmdi-eye"></i><?= Html::encode($especialidad->Visitas) ?></span>
                                               <span><i class="zmdi zmdi-comments"></i><?= Html::encode($especialidad->cnt) ?></span>
                                           </div>
                                            
                                            
                                            
                                           <div class="single-item-rating">
                                               <div class="starability-result" data-rating="<?=(int)$especialidad->rating?>" aria-describedby="rated-element"></div>
                                               

                                           </div>
                                        </div>   
                                    </div>
                                    <div class="button-bottom">
                                        
                                        <?= Html::a("Ver", ['site/coursesdetail', 'id' => $especialidad->idEspecialidades], ['class' => 'button-default']);?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            
                            
                            <div class="col-md-12 col-sm-12 text-center">
                                
                                <?= Html::a("Ver Todas las Especialidades <i class='zmdi zmdi-chevron-right'></i>", ['site/courses'], ['class' => 'button-default button-large']);?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Course Area-->
                <!--Fun Factor Area Start-->
                <div class="fun-factor-area" style="background-image: url('img/banner/<?=$inicio->imagenCifras?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title-wrapper white">
                                    <div class="section-title">
                                        <h3>CIFRAS IMPORTANTES</h3>
                                        <p>Datos que te pueden interesar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <div class="single-fun-factor">
                                    <h4>Alumnos</h4>
                                    <h2><span class="counter"><?=$inicio->cantidadAlumnos?></span>+</h2>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="single-fun-factor">
                                    <h4>Especialidades</h4>
                                    <h2><span class="counter"><?=Html::encode($cespecialidades)?></span>+</h2>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="single-fun-factor">
                                    <h4>Proyectos</h4>
                                    <h2><span class="counter"><?=Html::encode($cproyectos)?></span>+</h2>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="single-fun-factor">
                                    <h4>Premios</h4>
                                    <h2><span class="counter"><?=$inicio->cantidadPremios?></span>+</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Fun Factor Area-->   
                <!--Latest News Area Start--> 
                <div class="latest-area section-padding bg-white">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title-wrapper">
                                    <div class="section-title">
                                        <h3>Ultimas Noticias</h3>
                                        <p>There are many variations of passages</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <?php foreach ($noticias as $noticia): ?> 
                            <div class="col-md-6">
                                <div class="single-latest-item">
                                    <div class="single-latest-image">
                                        
                                        <?= Html::a("<img src='img/latest/".Html::encode($noticia->imagen)."' alt=''>", ['site/newsdetails', 'id' => $noticia->idnoticia]);?>
                                    </div>
                                    <div class="single-latest-text">
                                       
                                        <h3><?= Html::a(Html::encode($noticia->titulo), ['site/newsdetails', 'id' => $noticia->idnoticia]);?></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-calendar-check"></i><?=(new \DateTime($noticia->fecha))->format('d M Y')?></span>
                                           <span><i class="zmdi zmdi-eye"></i><?=Html::encode($noticia->visitas)?></span>
                                           <span><i class="zmdi zmdi-comments"></i><?=Html::encode($noticia->cnt)?></span>
                                       </div>
                                       <?= HtmlPurifier::process($noticia->descripcion) ?>
                               
                                       <?= Html::a("Leer", ['site/newsdetails', 'id' => $noticia->idnoticia], ['class' => 'button-default']);?>
                                    </div>
                                </div>
                                
                                
                            </div>
                            
                            <?php endforeach; ?>
                            
                            
                            
                        </div>
                    </div>
                </div>
                <!--End of Latest News Area--> 
                <!--Online Product Area Start-->
                <div class="product-area section-bottom-padding bg-white">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title-wrapper">
                                    <div class="section-title">
                                        <h3>Proyectos de alumnos</h3>
                                        <p>Proyectos desarrollados por alumnos como parte de su Trabajo Terminal, Servicio Social o bien como Materias Electivas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($proyectos as $proyecto): ?>
                            <div class="col-md-3 col-sm-4">
                                <div class="single-product-item">
                                    <div class="single-product-image">
                                        
                                        <?= Html::a("<img src='img/product/".Html::encode($proyecto->Imagen)."' alt=''>", ['site/proyectosdetail', 'id' => $proyecto->idProyecto]);?>
                                    </div>
                                    <div class="single-product-text">
                                        
                                        <h4><?= Html::a(Html::encode($proyecto->Titulo), ['site/proyectosdetail', 'id' => $proyecto->idProyecto]);?></h4>
                                        <h5><p><?= HtmlPurifier::process($proyecto->nombre) ?></p></h5>
                                        <div class="product-price">
                                 
                                           <div class="single-item-rating">
                                               
                                                <div class="starability-result" data-rating="<?=(int)$proyecto->rating?>" aria-describedby="rated-element"></div>
                                           </div>
                                        </div>
                                        <div class="product-buttons">
                                            <?= Html::a("Ver   ", ['site/proyectosdetail', 'id' => $proyecto->idProyecto], ['class' => 'button-default cart-btn']);?>
                                            <button type="button" class="button-default"><i class="zmdi zmdi-favorite"></i></button>
                                            
                                        </div>
                                    </div>
                                    <div class="button-bottom">
                                        
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <?php endforeach; ?>
                            
                            
                            
                        </div>
                    </div>
                </div>
                <!--End of Online Product Area-->
                <!--Testimonial Area Start-->
                <div class="testimonial-area" style="background-image: url('img/banner/<?=$inicio->imagenAlumnos?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-offset-0 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                                <div class="row">
                                    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                                        <div class="testimonial-image-slider text-center">
                                            <?php foreach ($alumnos as $alumno): ?>
                                            <div class="sin-testiImage">
                                                <img src="img/testimonial/<?=Html::encode($alumno->foto)?>" alt="testimonial 1" />
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div> 
                                <div class="testimonial-text-slider text-center">
                                    <?php foreach ($alumnos as $alumno): ?>
                                    <div class="sin-testiText">
                                        <h2><?=Html::encode($alumno->nombre)?></h2>
                                        <p><?=HtmlPurifier::process($alumno->descripcion)?></p>
                                    </div>
                                    <?php endforeach; ?>
                                    
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Testimonial Area-->
                <!--Event Area Start-->
                <div class="event-area section-padding bg-white">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title-wrapper">
                                    <div class="section-title">
                                        <h3>OUR EVENTS</h3>
                                        <p>There are many variations of passages</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($eventos as $evento): ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="single-event-item">
                                    <div class="single-event-image">
                                        <?= Html::a("<img src='img/event/".Html::encode($evento->imagen)."' alt=''><span>".(new \DateTime($evento->fecha))->format('d M')."</span>", ['site/eventdetail', 'id' => $evento->idevento]);?>
                                        
                                       
                                    </div>
                                    <div class="single-event-text">
                                        
                                        <h3><?= Html::a(Html::encode($evento->titulo), ['site/eventdetail', 'id' => $evento->idevento]);?></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-time"></i><?= (new \DateTime($evento->hora_inicio))->format('h.i a')?> - <?= (new \DateTime($evento->hora_fin))->format('h.i a')?></span>
                                           <span><i class="zmdi zmdi-pin"></i><?= Html::encode($evento->lugar)?></span>
                                       </div>
                                       <p><?= HtmlPurifier::process($evento->descripcion) ?></p>
                                       
                                       <?= Html::a("Leer", ['site/eventdetail', 'id' => $evento->idevento], ['class' => 'button-default']);?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            
                            
                        </div>
                    </div>
                </div>
                <!--End of Event Area-->
</div>
