<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
$this->title = 'Inicio';


?>
<div class="site-index">
                    
                 <!--Slider Area Start-->
                <div class="slider-area slider-two">
                    <div class="preview-2">
                        <div id="nivoslider" class="slides">   
                            <?php $i = 1; foreach($slide as $slide_1): ?>
                                <img src='<?=Yii::getAlias('@uploadUrl').'/'.$slide_1->Imagen ?>' alt='' title='#slider-1-caption<?= $i ?>'/> 
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
                <div class="about-area" style="background-image: url('<?=Yii::getAlias('@uploadUrl').'/'.$portada->imagen ?>');">
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
                                        
                                        <?= Html::a("<img src='".Yii::getAlias('@uploadUrl').'/'.Html::encode($especialidad->imagen)."' alt=''>", ['site/coursesdetail', 'id' => $especialidad->idEspecialidades]);?>
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
                <div class="fun-factor-area" style="background-image: url('<?=Yii::getAlias('@uploadUrl').'/'.$inicio->imagenCifras?>');">
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
                                        
                                        <?= Html::a("<img src='".Yii::getAlias('@uploadUrl').'/'.Html::encode($noticia->imagen)."' alt=''>", ['site/newsdetails', 'id' => $noticia->idnoticia]);?>
                                    </div>
                                    <div class="single-latest-text">
                                       
                                        <h3><?= Html::a(Html::encode($noticia->titulo), ['site/newsdetails', 'id' => $noticia->idnoticia]);?></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-calendar-check"></i><?=(new \DateTime($noticia->fecha))->format('d M Y')?></span>
                                           <span><i class="zmdi zmdi-eye"></i><?=Html::encode($noticia->visitas)?></span>
                                           <span><i class="zmdi zmdi-comments"></i><?=Html::encode($noticia->cnt)?></span>
                                       </div>
                                        <p><?= HtmlPurifier::process($noticia->descripcion) ?></p>
                               
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
                                        
                                        <?= Html::a("<img src='".Yii::getAlias('@uploadUrl').'/'.Html::encode($proyecto->Imagen)."' alt=''>", ['site/proyectosdetail', 'id' => $proyecto->idProyecto]);?>
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
                <div class="testimonial-area" style="background-image: url('<?=Yii::getAlias('@uploadUrl').'/'.$inicio->imagenAlumnos?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-offset-0 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                                <div class="row">
                                    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                                        <div class="testimonial-image-slider text-center">
                                            <?php foreach ($alumnos as $alumno): ?>
                                            <div class="sin-testiImage">
                                                <img src="<?=Yii::getAlias('@uploadUrl').'/'.Html::encode($alumno->foto)?>" alt="testimonial 1" />
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
                                        <h3>EVENTOS</h3>
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
                                        <?= Html::a("<img src='".Yii::getAlias('@uploadUrl').'/'.Html::encode($evento->imagen)."' alt=''><span>".(new \DateTime($evento->fecha))->format('d M')."</span>", ['site/eventdetail', 'id' => $evento->idevento]);?>
                                        
                                       
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
