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

class TestController extends Controller
{
   public $layout = "shablon";
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

}