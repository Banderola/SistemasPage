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
use common\models\Noticia;
use common\models\Evento;
use common\models\Especialidad;
use common\models\Categoriaespecialidad;
use common\models\Maestro;
use common\models\Alumno;
use common\models\Proyecto;
use common\models\Categoriaproyecto;

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
							'modifynew',
							'modifyevent',
							'modifyspeciality',
							'modifyproject',
							'modifyprojectcategory',
							'modifyspecialitycategory',
							'modifyteacher',
							'modifystudent',
							'deletenew',
							'deleteevent',
							'deletespeciality',
							'deleteproject',
							'deleteprojectcategory',
							'deletespecialitycategory',
							'deleteteacher',
							'deletestudent'
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
	
	public function actionProjectcategorymanager(){
		return $this->render('projectcategorymanager');
	}
	
	public function actionStudentsmanager(){
		return $this->render('studentsmanager');
	}
	
	public function actionTeachersmanager(){
		return $this->render('teachersmanager');
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
	
	
	//DELETERS
	public function actionDeletenew($id)
    {
        $model = new TeacherForm();
         if ($model->load(Yii::$app->request->post()) && $model->addNew()) {
            return $this->render('newsmanager');
        } else {
            return $this->render('newform', ['model' => $model]);
        }
    }
}