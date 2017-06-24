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
							'news',
							'uploadPhoto',
							'newsmanager',
							'newspeciality',
							'speciality',
							'specialitymanager',
							'projectsmanager',
							'project',
							'event',
							'eventsmanager',
							'specialitycategory',
							'specialitycategorymanager'
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
                'height' => 300,
        ]
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
	
	
	//ADDERS
    public function actionNews()
    {
        $model = new NewsForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('index');
        } else {
            return $this->render('newform', ['model' => $model]);
        }
    }
    
    public function actionSpeciality()
    {
        $model = new SpecialityForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('index');
        } else {
            return $this->render('newspeciality', ['model' => $model]);
        }
    }
	
	public function actionProject(){
		$model = new ProjectForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('index');
        } else {
            return $this->render('newproject', ['model' => $model]);
        }
	}
	
	public function actionEvent(){
		$model = new EventForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('index');
        } else {
            return $this->render('newevent', ['model' => $model]);
        }
	}
	
	public function actionSpecialitycategory(){
		$model = new SpecialityCategoryForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('index');
        } else {
            return $this->render('newspecialitycategory', ['model' => $model]);
        }
	}
}
