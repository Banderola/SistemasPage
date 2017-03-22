<?php
namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\NewsForm;

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
                        'actions' => ['news', 'uploadPhoto','newsmanager'],
                        'allow' => true,
                        'roles' => ['administrar']
                    ],
                    
                    [
                        'actions' => ['index','news'],
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
	
	public function actionNewsmanager(){
		return $this->render('newsmanager');
	}
    
    
    public function actionNews()
    {
        $model = new NewsForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('index');
        } else {
            return $this->render('newform', ['model' => $model]);
        }
    }
    
    

   
}
