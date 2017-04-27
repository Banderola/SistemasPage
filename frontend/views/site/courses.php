<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;
use yii\helpers\HtmlPurifier;


$this->title = 'Courses';

?>

<div class="site-courses">
   
  <!--Breadcrumb Banner Area Start-->
                <div class="breadcrumb-banner-area" style="background-image: url('img/banner/<?= Html::encode($portada->imagen) ?>');">
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
                                            
                                    
                                    <div class="form-container">
              
                                        <div class="box-select">
                                            <div class="select large">
                                               <?= Html::beginForm(['site/courses'], 'get', ['enctype' => 'multipart/form-data']) ?> 
                                                <?= Html::dropDownList('id', Yii::$app->request->get('id'),ArrayHelper::map(common\models\Categoriaespecialidad::find()->all(), 'idCategoriaEspecialidad', 'Nombre'), ['prompt' => ' Todos ']) ?>
                                                
                                               
                                            </div>
                                            
                                            
                                        </div>
                                        <?= Html::submitButton('Filtrar', ['class' => 'teaser']) ?>
                                        <?= Html::endForm() ?>
                                    </div>
                                           
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Search Category-->
                <!--Course Area Start-->
                <div class="course-area section-padding course-page">
                    <div class="container">
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
                                       
                                        </div>
                                        <p><?= HtmlPurifier::process($especialidad->Descripcion) ?></p>
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
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                 
                                <div class="pagination-content">
                                    <?= LinkPager::widget(['pagination' => $pagination]) ?>
                                    
                                    <ul class="pagination">
                                       
<!--                                        <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                        <li class="current"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Course Area-->
                
    

</div>