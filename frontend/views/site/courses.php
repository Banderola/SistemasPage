<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\LinkPager;


$this->title = 'Courses';

?>
<?php
$script = <<< JS
            $( document ).ready(function() {
            $('.rate_row').starwarsjs({
                stars : 5,
                count : 1
            });
        });
JS;
$this->registerJs($script);
?>
<div class="site-courses">
   
  <!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area" style="background-image: url('img/banner/<?= $portada->imagen ?>');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h1 class="text-center">POPULAR COURSES</h1>
                                    <div class="breadcrumb-bar">
                                        <ul class="breadcrumb text-center">
                                            <li><a href="index.html">Home</a></li>
                                            <li>Courses</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Breadcrumb Banner Area-->
                <!--Search Category Start-->
                <div class="search-category">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <form action="#" method="post">
                                    <div class="form-container">
                                        <div class="box-select">
                                            <div class="select large">
                                                <select name="category">
                                                    <option>All Categories</option>
                                                    <option>Web Design</option>
                                                    <option>Designing</option>
                                                    <option>Development</option>
                                                    <option>Programming</option>
                                                    <option>Developing</option>
                                                </select>
                                            </div>
                                            <div class="select small">
                                                <select name="date">
                                                    <option>Price</option>
                                                    <option>$10000</option>
                                                    <option>$35000</option>
                                                    <option>$67000</option>
                                                    <option>$82000</option>
                                                    <option>$95000</option>
                                                </select>
                                            </div>
                                            <div class="select medium">
                                                <select name="date">
                                                    <option>Course Type</option>
                                                    <option>Web Design</option>
                                                    <option>Designing</option>
                                                    <option>Development</option>
                                                    <option>Programming</option>
                                                    <option>Developing</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="button">Search Course</button>
                                    </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Search Category-->
                <!--Course Area Start-->
                <div class="course-area section-padding course-page">
                    <div class="container">
                        <div class="row">
                            <?php foreach($models as $model): ?>
                                <div class="col-md-4 col-sm-6">
                                <div class="single-item">
                                    <div class="single-item-image overlay-effect">
                                        <a href="courses-details.html"><img src="img/course/<?= $model->imagen ?>" alt=""></a>
                                    </div>
                                    <div class="single-item-text">
                                        <h4><a href="courses-details.html"><?= $model->Titulo ?></a></h4>
                                        <div class="single-item-text-info">
                                       
                                        </div>
                                        <p><?= $model->Descripcion ?></p>
                                        <div class="single-item-content">
                                           <div class="single-item-comment-view">
                                               <span><i class="zmdi zmdi-eye"></i><?= $model->Visitas ?></span>
                                               <span><i class="zmdi zmdi-comments"></i><?= $model->cnt ?></span>
                                           </div>
                                            
                                            
                                            
                                           <div class="single-item-rating">
                                               <div class="rate_row"></div> <!-- Single Row -->
<!--                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star-half"></i>-->
                                           </div>
                                        </div>   
                                    </div>
                                    <div class="button-bottom">
                                        <a href="courses-details.html" class="button-default">Ver</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
<!--                            <div class="col-md-4 col-sm-6">
                                <div class="single-item">
                                    <div class="single-item-image overlay-effect">
                                        <a href="courses-details.html"><img src="img/course/1.jpg" alt=""></a>
                                    </div>
                                    <div class="single-item-text">
                                        <h4><a href="courses-details.html">Photoshop CC 2016</a></h4>
                                        <div class="single-item-text-info">
                                            <span>By: <span>M S Nawaz</span></span>
                                            <span>Date: <span>20.5.15</span></span>
                                        </div>
                                        <p>There are many variations of sages of Lorem Ipsum available, but the mrity have suffered alteration in some orm, by injected humo
        ur,There are many but the mri have suffered alteration in some </p>
                                        <div class="single-item-content">
                                           <div class="single-item-comment-view">
                                               <span><i class="zmdi zmdi-eye"></i>59</span>
                                               <span><i class="zmdi zmdi-comments"></i>19</span>
                                           </div>
                                           <div class="single-item-rating">
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star"></i>
                                               <i class="zmdi zmdi-star-half"></i>
                                           </div>
                                        </div>   
                                    </div>
                                    <div class="button-bottom">
                                        <a href="courses-details.html" class="button-default">Learn Now</a>
                                    </div>
                                </div>
                            </div>-->
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination-content">
                                    <ul class="pagination">
                                        <?php
                                           echo LinkPager::widget([
    'pagination' => $pages,
]);                   
                                        ?>
<!--                                        <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                        <li class="current"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Course Area-->
                <!--Teachers Area Start-->
                <div class="teachers-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title-wrapper">
                                    <div class="section-title">
                                        <h3>OUR TEACHERS</h3>
                                        <p>There are many variations of passages of Lorem Ipsum</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="single-teacher-item">
                                    <div class="single-teacher-image">
                                        <a href="#"><img src="img/teacher/l-1.jpg" alt=""></a>
                                    </div>
                                    <div class="single-teacher-text">
                                        <h3><a href="#">Louis Smith</a></h3>
                                        <h4>Teacher</h4>
                                        <p>There are many variaons of passa of Lorem Ipsuable, amrn in sofby injected humour, amr</p>
                                        <div class="social-links">
                                            <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                            <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                            <a href="#"><i class="zmdi zmdi-google-old"></i></a>
                                            <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="single-teacher-item">
                                    <div class="single-teacher-image">
                                        <a href="#"><img src="img/teacher/l-2.jpg" alt=""></a>
                                    </div>
                                    <div class="single-teacher-text">
                                        <h3><a href="#">Louis Smith</a></h3>
                                        <h4>Teacher</h4>
                                        <p>There are many variaons of passa of Lorem Ipsuable, amrn in sofby injected humour, amr</p>
                                        <div class="social-links">
                                            <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                            <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                            <a href="#"><i class="zmdi zmdi-google-old"></i></a>
                                            <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 hidden-sm">
                                <div class="single-teacher-item">
                                    <div class="single-teacher-image">
                                        <a href="#"><img src="img/teacher/l-3.jpg" alt=""></a>
                                    </div>
                                    <div class="single-teacher-text">
                                        <h3><a href="#">Louis Smith</a></h3>
                                        <h4>Teacher</h4>
                                        <p>There are many variaons of passa of Lorem Ipsuable, amrn in sofby injected humour, amr</p>
                                        <div class="social-links">
                                            <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                            <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                            <a href="#"><i class="zmdi zmdi-google-old"></i></a>
                                            <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 hidden-md hidden-sm">
                                <div class="single-teacher-item">
                                    <div class="single-teacher-image">
                                        <a href="#"><img src="img/teacher/l-4.jpg" alt=""></a>
                                    </div>
                                    <div class="single-teacher-text">
                                        <h3><a href="#">Louis Smith</a></h3>
                                        <h4>Teacher</h4>
                                        <p>There are many variaons of passa of Lorem Ipsuable, amrn in sofby injected humour, amr</p>
                                        <div class="social-links">
                                            <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                            <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                            <a href="#"><i class="zmdi zmdi-google-old"></i></a>
                                            <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Teachers Area-->
    

</div>