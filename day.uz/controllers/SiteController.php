<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Xabarlar;
use app\models\View;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    //public $layout = "shablon";
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
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
     * {@inheritdoc}
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
     * @return string
     */
   
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        
        if(!(Yii::$app->session->has('til')))
        {
            Yii::$app->session->set('til','uz');
        }

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionFullnews($id)
    {
        $n = Xabarlar::findOne($id);
        $t = Xabarlar::find()->orderBy(['korishlar_soni'=>SORT_DESC])->limit(6)->all();

        $update = Xabarlar::findOne($id);
        $update->korishlar_soni = $update->korishlar_soni+1;
        $update->update();

        return $this->render('fullnews', ['new' => $n, 'news' => $t]);
    }


    public function actionIndex()
    {
        if(!(Yii::$app->session->has('til')))
        {
            Yii::$app->session->set('til','uz');
        }

        $n = Xabarlar::find()->orderBy(['korishlar_soni'=>SORT_DESC])->limit(6)->all();

        $query = Xabarlar::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'defaultPageSize' => 3]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
             'news' => $models,
             'pages' => $pages,
             'koplab' => $n,
        ]);
    }

    public function actionUzbekistan()
    {
        $n = Xabarlar::find()->orderBy(['korishlar_soni'=>SORT_DESC])->limit(6)->all();

        $query = Xabarlar::find()->where(['bolim_id'=>1]);
        $pages = new Pagination(['totalCount' => $query->count(), 'defaultPageSize' => 3]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('uzbekistan', [
             'news' => $models,
             'pages' => $pages,
             'koplab' => $n,
        ]);
    }

    public function actionDunyo()
    {
        $n = Xabarlar::find()->orderBy(['korishlar_soni'=>SORT_DESC])->limit(6)->all();

        $query = Xabarlar::find()->where(['bolim_id'=>2]);
        $pages = new Pagination(['totalCount' => $query->count(), 'defaultPageSize' => 3]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('dunyo', [
             'news' => $models,
             'pages' => $pages,
             'koplab' => $n,
        ]);
    }

    public function actionSport()
    {
        // shablon ishga tushsa yangi vid hosil bo'ladi.
        //$this->layout = "shablon";
        $n = Xabarlar::find()->orderBy(['korishlar_soni'=>SORT_DESC])->limit(6)->all();

        $query = Xabarlar::find()->where(['bolim_id'=>3]);
        $pages = new Pagination(['totalCount' => $query->count(), 'defaultPageSize' => 3]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('sport', [
             'news' => $models,
             'pages' => $pages,
             'koplab' => $n,
        ]);
    }

    public function actionOzgar($til)
    {
        Yii::$app->session->set('til', $til);

        Yii::$app->language = $til;
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionRegister()
    {
        $model = new \app\models\User();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->password = md5(md5($model->password));
                $model->password_repeat = md5(md5($model->password_repeat));
                $model->authKey=Yii::$app->security->generateRandomString(10);
                $model->accessToken=Yii::$app->security->generateRandomString(10);
                $model->sana=date("Y-m-d H:i:s");
                $model->save();
                // return $this->goHome();
                return $this->redirect(['/']);
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

}
