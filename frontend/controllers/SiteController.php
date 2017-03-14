<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Paginainicio;
use common\models\Slide;
use common\models\Paginaimagenportada;
use common\models\Paginanosotros;
use common\models\Experiencia;
use common\models\Maestro;
use common\models\Paginacontacto;
use common\models\Paginaenlaces;
use common\models\Especialidad;
use yii\data\Pagination;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $this->view->params['model'] = Paginacontacto::findOne(1);
        $this->view->params['model_enlaces'] = Paginaenlaces::find()->all();
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
        
        $model_inicio = Paginainicio::findOne(1);
        $model_slide = Slide::find()->all();
        $model_portada = Paginaimagenportada::findOne(1);
        return $this->render('index', [
                'inicio' => $model_inicio,'slide' => $model_slide,'portada' => $model_portada,
            ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model_portada = Paginaimagenportada::findOne(7);
        
       // $model = new ContactForm();
      //  if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          //  if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
           //     Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
         //   } else {
         //       Yii::$app->session->setFlash('error', 'There was an error sending email.');
        //    }

         //   return $this->refresh();
       // } else {
        return $this->render('contact', [
                'portada' => $model_portada,
            ]);
           // return $this->render('contact', [
       //         'model' => $model,
      //      ]);
     //   }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $model_nosotros = Paginanosotros::findOne(1);
        $model_experiencia = Experiencia::find()->all();
        $model_maestro = Maestro::find()->all();
        $model_portada = Paginaimagenportada::findOne(2);
        return $this->render('about', [
                'nosotros' => $model_nosotros,'experiencias' => $model_experiencia,'maestros' => $model_maestro,'portada' => $model_portada,
            ]);
    }

     public function actionCourses()
    {
        $model_portada = Paginaimagenportada::findOne(3);
        $model_especialidad = Especialidad::find()
                ->select('especialidad.*, COUNT(idComentarioEspecialidad) AS cnt')
                ->leftJoin('comentarioespecialidad','idEspecialidades=Especialidad_idEspecialidades')
                ->groupBy('idEspecialidades')
                ->with('comentarioespecialidads')
                ->all();
        $query = Especialidad::find();
        $count = $query->count();
        $pages = new Pagination(['totalCount' => $count]);
        $models = $query->offset($pages->offset)
        ->limit(2)
        ->all();
             
        return $this->render('courses', [
                'portada' => $model_portada,'models' => $models,'pages' => $pages,
            ]);
    }

      public function actionShopgrid()
    {
        $model_portada = Paginaimagenportada::findOne(4);
        return $this->render('shopgrid', [
                'portada' => $model_portada,
            ]);
    }

      public function actionLatestnews()
    {
        $model_portada = Paginaimagenportada::findOne(5);
        return $this->render('latestnews', [
                'portada' => $model_portada,
            ]);
    }

      public function actionEvent()
    {
        $model_portada = Paginaimagenportada::findOne(6);
        return $this->render('event', [
                'portada' => $model_portada,
            ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
