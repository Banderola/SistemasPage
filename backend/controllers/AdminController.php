<?php
namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\SpecialityForm;
use backend\models\NewsForm;
use backend\models\ProjectForm;
use backend\models\EventForm;
use backend\models\SpecialityCategoryForm;
use backend\models\ProjectCategoryForm;
use backend\models\StudentForm;
use backend\models\TeacherForm;
use backend\models\SlideForm;
use backend\models\ExperienceForm;
use backend\models\ContactForm;
use backend\models\LinkForm;
use backend\models\FrontpageForm;
use backend\models\IndexForm;
use backend\models\UsForm;

use common\models\Noticia;
use common\models\Evento;
use common\models\Especialidad;
use common\models\Categoriaespecialidad;
use common\models\Maestro;
use common\models\Alumno;
use common\models\Proyecto;
use common\models\Categoriaproyecto;
use common\models\Slide;
use common\models\Experiencia;
use common\models\Paginacontacto;
use common\models\Paginaenlaces;
use common\models\Paginaimagenportada;
use common\models\Paginainicio;
use common\models\Paginanosotros;


/**
 * Site controller
 */
class AdminController extends Controller
{
    //public $layout = 'login';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        
        return [
            'access' => [
                'class' => AccessControl::className(),
                
                'rules' => [
                    [
                        'actions' => ['error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [
							//ADDERS & MANAGERS
							'news',
							'newsmanager',
							'newspeciality',
							'speciality',
							'specialitymanager',
							'projectsmanager',
							'project',
							'event',
							'eventsmanager',
							'specialitycategory',
							'specialitycategorymanager',
							'projectcategory',
							'projectcategorymanager',
							'teacher',
							'teachersmanager',
							'student',
							'studentsmanager',
							'slide',
							'slidesmanager',
							'experience',
							'experiencemanager',
							'contactmanager',
							'link',
							'linksmanager',
							'frontpage',
							'frontpagemanager',
							'indexmanager',
							'usmanager',
							
							//MODIFIERS
							'modifynew',
							'modifyevent',
							'modifyspeciality',
							'modifyproject',
							'modifyprojectcategory',
							'modifyspecialitycategory',
							'modifyteacher',
							'modifystudent',
							'modifyslide',
							'modifyexperience',
							'modifylink',
							'modifyfrontpage',
							
							//DELETERS
							'deletenew',
							'deleteevent',
							'deletespeciality',
							'deleteproject',
							'deleteprojectcategory',
							'deletespecialitycategory',
							'deleteteacher',
							'deletestudent',
							'deleteslide',
							'deleteexperience',
							'deletelink',
							'deletefrontpage',
							],
                        'allow' => true,
                        'roles' => ['administrar']
                    ],
                    
                    [
                        'actions' => [
							'index',
							'news',
							'speciality'
							],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'uploadPhoto' => [
                'class' => 'budyaga\cropper\actions\UploadAction',
                //TODO: ver cual es el link para la foto
                //'uploadParameter' => 'nombre unico de la imagen con extension',
                'url' => 'http://localhost/Servicio/SistemasPage/common/uploads/photos',
                'path' => '@common/uploads/photos',
                'width' => 700,
                'height' => 300,],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        
        return $this->render('index');
    }
	//MANAGERS
	public function actionProjectsmanager(){
		return $this->render('projectsmanager');
	}
	
	public function actionNewsmanager(){
		return $this->render('newsmanager');
	}
    
	public function actionSpecialitymanager(){
		return $this->render('specialitymanager');
	}
    
	public function actionEventsmanager(){
		return $this->render('eventsmanager');
	}
	
	public function actionSpecialitycategorymanager(){
		return $this->render('specialitycategorymanager');
	}
	
	public function actionProjectcategorymanager(){
		return $this->render('projectcategorymanager');
	}
	
	public function actionStudentsmanager(){
		return $this->render('studentsmanager');
	}
	
	public function actionTeachersmanager(){
		return $this->render('teachersmanager');
	}
	
	public function actionSlidesmanager(){
		return $this->render('slidesmanager');
	}
	
	public function actionExperiencemanager(){
		return $this->render('experiencemanager');
	}
	
	public function actionContactmanager(){
		$model= new ContactForm();
		if($found=Paginacontacto::findOne(1)){
			$model->fillFromExisting($found);
			if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
				$model->fillFromExisting(Paginacontacto::findOne(1));
				return $this->render('contactmanager', ['model'=>$model]);
			} else {
				return $this->render('contactmanager', ['model' => $model]);
			}
		}
		else{
			return $this->render('contactmanager', ['model' => $model]);
		}
		return $this->render('contactmanager');
	}
	
	public function actionLinksmanager(){
		return $this->render('linksmanager');
	}
	
	public function actionFrontpagemanager(){
		return $this->render('frontpagemanager');
	}
	
	public function actionIndexmanager(){
		$model= new IndexForm();
		if($found=Paginainicio::findOne(1)){
			$model->fillFromExisting($found);
			if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
				$model->fillFromExisting(Paginainicio::findOne(1));
				return $this->render('indexmanager', ['model'=>$model]);
			} else {
				return $this->render('indexmanager', ['model' => $model]);
			}
		}
		else{
			return $this->render('indexmanager', ['model' => $model]);
		}
		return $this->render('indexmanager');
	}
	
	public function actionUsmanager(){
		$model= new UsForm();
		if($found=Paginanosotros::findOne(1)){
			$model->fillFromExisting($found);
			if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
				$model->fillFromExisting(Paginanosotros::findOne(1));
				return $this->render('usmanager', ['model'=>$model]);
			} else {
				return $this->render('usmanager', ['model' => $model]);
			}
		}
		else{
			return $this->render('usmanager', ['model' => $model]);
		}
		return $this->render('indexmanager');
	}
	
	//ADDERS
    public function actionNews()
    {
        $model = new NewsForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('newsmanager');
        } else {
            return $this->render('newform', ['model' => $model]);
        }
    }
    
    public function actionSpeciality()
    {
        $model = new SpecialityForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('specialitymanager');
        } else {
            return $this->render('newspeciality', ['model' => $model]);
        }
    }
	
	public function actionProject(){
		$model = new ProjectForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('projectsmanager');
        } else {
            return $this->render('newproject', ['model' => $model]);
        }
	}
	
	public function actionEvent(){
		$model = new EventForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('eventsmanager');
        } else {
            return $this->render('newevent', ['model' => $model]);
        }
	}
	
	public function actionSpecialitycategory(){
		$model = new SpecialityCategoryForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('specialitycategorymanager');
        } else {
            return $this->render('newspecialitycategory', ['model' => $model]);
        }
	}
	
	public function actionProjectcategory(){
		$model = new ProjectCategoryForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('projectcategorymanager');
        } else {
            return $this->render('newprojectcategory', ['model' => $model]);
        }
	}
	
	public function actionStudent()
    {
        $model = new StudentForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('studentsmanager');
        } else {
            return $this->render('newstudent', ['model' => $model]);
        }
    }
	
	public function actionTeacher()
    {
        $model = new TeacherForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('teachersmanager');
        } else {
            return $this->render('newteacher', ['model' => $model]);
        }
    }
	
	public function actionSlide()
	{
		$model = new SlideForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('slidesmanager');
        } else {
            return $this->render('newslide', ['model' => $model]);
        }
	}
	
	public function actionExperience()
	{
		$model = new ExperienceForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('experiencemanager');
        } else {
            return $this->render('newexperience', ['model' => $model]);
        }
	}
	
	public function actionLink()
	{
		$model = new LinkForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('linksmanager');
        } else {
            return $this->render('newlink', ['model' => $model]);
        }
	}
	
	public function actionFrontpage()
	{
		$model = new FrontpageForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('frontpagemanager');
        } else {
            return $this->render('newfrontpage', ['model' => $model]);
        }
	}
	
	//MODDIFIERS
	public function actionModifynew($id)
    {
		$found=Noticia::findOne($id);
        $model = new NewsForm();
		$model->fillFromExisting($found);
         if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
            return $this->render('newsmanager');
        } else {
            return $this->render('newform', ['model' => $model]);
        }
    }
	
	public function actionModifyevent($id)
    {
		$found=Evento::findOne($id);
        $model = new EventForm();
		$model->fillFromExisting($found);
         if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
            return $this->render('eventsmanager');
        } else {
            return $this->render('newevent', ['model' => $model]);
        }
    }
	
	public function actionModifyspeciality($id)
    {
		$found=Especialidad::findOne($id);
        $model = new SpecialityForm();
		$model->fillFromExisting($found);
         if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
            return $this->render('specialitymanager');
        } else {
            return $this->render('newspeciality', ['model' => $model]);
        }
    }
	
	public function actionModifyspecialitycategory($id){
		$found=CategoriaEspecialidad::findOne($id);
		$model= new SpecialityCategoryForm();
		$model->fillFromExisting($found);
         if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
            return $this->render('specialitycategorymanager');
        } else {
            return $this->render('newspecialitycategory', ['model' => $model]);
        }
	}
	
	public function actionModifyproject($id)
    {
		$found=Proyecto::findOne($id);
        $model = new ProjectForm();
		$model->fillFromExisting($found);
         if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
            return $this->render('projectsmanager');
        } else {
            return $this->render('newproject', ['model' => $model]);
        }
    }
	
	public function actionModifyprojectcategory($id){
		$found=Categoriaproyecto::findOne($id);
		$model= new ProjectCategoryForm();
		$model->fillFromExisting($found);
         if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
            return $this->render('projectcategorymanager');
        } else {
            return $this->render('newprojectcategory', ['model' => $model]);
        }
	}
	
	public function actionModifyteacher($id){
		$found=Maestro::findOne($id);
		$model= new TeacherForm();
		$model->fillFromExisting($found);
         if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
            return $this->render('teachersmanager');
        } else {
            return $this->render('newteacher', ['model' => $model]);
        }
	}
	
	public function actionModifystudent($id){
		$found=Alumno::findOne($id);
		$model= new StudentForm();
		$model->fillFromExisting($found);
         if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
            return $this->render('studentsmanager');
        } else {
            return $this->render('newstudent', ['model' => $model]);
        }
	}
	
	public function actionModifyslide($id){
		$found=Slide::findOne($id);
		$model= new SlideForm();
		$model->fillFromExisting($found);
         if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
            return $this->render('slidesmanager');
        } else {
            return $this->render('newslide', ['model' => $model]);
        }
	}
	
	public function actionModifyexperience($id){
		$found=Experiencia::findOne($id);
		$model= new ExperienceForm();
		$model->fillFromExisting($found);
         if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
            return $this->render('experiencemanager');
        } else {
            return $this->render('newexperience', ['model' => $model]);
        }
	}
	
	public function actionModifylink($id){
		$found=Paginaenlaces::findOne($id);
		$model= new LinkForm();
		$model->fillFromExisting($found);
         if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
            return $this->render('linksmanager');
        } else {
            return $this->render('newlink', ['model' => $model]);
        }
	}
	
	public function actionModifyfrontpage($id){
		$found=Paginaimagenportada::findOne($id);
		$model= new FrontpageForm();
		$model->fillFromExisting($found);
         if ($model->load(Yii::$app->request->post()) && $model->modifyExisting($found)) {
            return $this->render('frontpagemanager');
        } else {
            return $this->render('newfrontpage', ['model' => $model]);
        }
	}
	
	//DELETERS
	public function actionDeletenew($id)
    {
        $found=Noticia::findOne($id);
		$found->delete();
		return $this->render('newsmanager');
    }
	
	public function actionDeleteevent($id)
    {
        $found=Evento::findOne($id);
		$found->delete();
		return $this->render('eventsmanager');
    }
	
	public function actionDeletespeciality($id)
    {
        $found=Especialidad::findOne($id);
		$found->delete();
		return $this->render('specialitymanager');
    }
	
	public function actionDeleteproject($id)
    {
        $found=Proyecto::findOne($id);
		$found->delete();
		return $this->render('projectsmanager');
    }
	
	public function actionDeleteprojectcategory($id)
    {
        $found=Categoriaproyecto::findOne($id);
		$found->delete();
		return $this->render('projectcategorymanager');
    }
	
	public function actionDeletespecialitycategory($id)
    {
        $found=CategoriaEspecialidad::findOne($id);
		$found->delete();
		return $this->render('specialitycategorymanager');
    }
	
	public function actionDeleteteacher($id)
    {
        $found=Maestro::findOne($id);
		$found->delete();
		return $this->render('teachersmanager');
    }
	
	public function actionDeletestudent($id)
    {
        $found=Alumno::findOne($id);
		$found->delete();
		return $this->render('studentsmanager');
    }
	
	public function actionDeleteslide($id)
    {
        $found=Slide::findOne($id);
		$found->delete();
		return $this->render('slidesmanager');
    }
	
	public function actionDeleteexperience($id)
    {
        $found=Experiencia::findOne($id);
		$found->delete();
		return $this->render('experiencemanager');
    }
	
	public function actionDeletelink($id)
    {
        $found=Paginaenlaces::findOne($id);
		$found->delete();
		return $this->render('linksmanager');
    }
	
	public function actionDeletefrontpage($id)
    {
        $found=Paginaimagenportada::findOne($id);
		$found->delete();
		return $this->render('frontpagemanager');
    }
}