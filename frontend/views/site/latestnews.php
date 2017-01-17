<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Latestnews';

?>
<div class="site-latestnews">
  
<!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumb-text">
                                    <h1 class="text-center">Latest News</h1>
                                    <div class="breadcrumb-bar">
                                        <ul class="breadcrumb text-center">
                                            <li><a href="index.html">Home</a></li>
                                            <li>Latest News</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Breadcrumb Banner Area-->
                <!--Latest News Area Start--> 
                <div class="latest-area section-padding latest-page">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-latest-item">
                                    <div class="single-latest-image">
                                        <a href="news-details.html"><img src="img/latest/1.jpg" alt=""></a>
                                    </div>
                                    <div class="single-latest-text">
                                        <h3><a href="news-details.html">Learn English in ease</a></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-calendar-check"></i>25 jun 2050</span>
                                           <span><i class="zmdi zmdi-eye"></i>59</span>
                                           <span><i class="zmdi zmdi-comments"></i>19</span>
                                       </div>
                                       <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour, </p>
                                       <a href="news-details.html" class="button-default">LEARN Now</a>
                                    </div>
                                </div>
                                <div class="single-latest-item">
                                    <div class="single-latest-image">
                                        <a href="news-details.html"><img src="img/latest/2.jpg" alt=""></a>
                                    </div>
                                    <div class="single-latest-text">
                                        <h3><a href="news-details.html">Learn English in ease</a></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-calendar-check"></i>25 jun 2050</span>
                                           <span><i class="zmdi zmdi-eye"></i>59</span>
                                           <span><i class="zmdi zmdi-comments"></i>19</span>
                                       </div>
                                       <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour, </p>
                                       <a href="news-details.html" class="button-default">LEARN Now</a>
                                    </div>
                                </div>
                                <div class="single-latest-item">
                                    <div class="single-latest-image">
                                        <a href="news-details.html"><img src="img/latest/5.jpg" alt=""></a>
                                    </div>
                                    <div class="single-latest-text">
                                        <h3><a href="news-details.html">Learn English in ease</a></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-calendar-check"></i>25 jun 2050</span>
                                           <span><i class="zmdi zmdi-eye"></i>59</span>
                                           <span><i class="zmdi zmdi-comments"></i>19</span>
                                       </div>
                                       <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour, </p>
                                       <a href="news-details.html" class="button-default">LEARN Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-latest-item">
                                    <div class="single-latest-image">
                                        <a href="news-details.html"><img src="img/latest/3.jpg" alt=""></a>
                                    </div>
                                    <div class="single-latest-text">
                                        <h3><a href="news-details.html">Learn English in ease</a></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-calendar-check"></i>25 jun 2050</span>
                                           <span><i class="zmdi zmdi-eye"></i>59</span>
                                           <span><i class="zmdi zmdi-comments"></i>19</span>
                                       </div>
                                       <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour, </p>
                                       <a href="news-details.html" class="button-default">LEARN Now</a>
                                    </div>
                                </div>
                                <div class="single-latest-item">
                                    <div class="single-latest-image">
                                        <a href="news-details.html"><img src="img/latest/4.jpg" alt=""></a>
                                    </div>
                                    <div class="single-latest-text">
                                        <h3><a href="news-details.html">Learn English in ease</a></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-calendar-check"></i>25 jun 2050</span>
                                           <span><i class="zmdi zmdi-eye"></i>59</span>
                                           <span><i class="zmdi zmdi-comments"></i>19</span>
                                       </div>
                                       <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour, </p>
                                       <a href="news-details.html" class="button-default">LEARN Now</a>
                                    </div>
                                </div>
                                <div class="single-latest-item">
                                    <div class="single-latest-image">
                                        <a href="news-details.html"><img src="img/latest/6.jpg" alt=""></a>
                                    </div>
                                    <div class="single-latest-text">
                                        <h3><a href="news-details.html">Learn English in ease</a></h3>
                                        <div class="single-item-comment-view">
                                           <span><i class="zmdi zmdi-calendar-check"></i>25 jun 2050</span>
                                           <span><i class="zmdi zmdi-eye"></i>59</span>
                                           <span><i class="zmdi zmdi-comments"></i>19</span>
                                       </div>
                                       <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour, </p>
                                       <a href="news-details.html" class="button-default">LEARN Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination-content">
                                    <ul class="pagination">
                                        <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                        <li class="current"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Latest News Area-->

</div>