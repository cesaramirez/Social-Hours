<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\components\AccessFilter;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            [
              'class' => AccessFilter::className(),
              'overideSession' => ['login','logout'],
              'overideSecurity' => ['login','logout','index','error','unauthorized']
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionUnauthorized()
    {
        return $this->render('desautorizado');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $model = new LoginForm;
        if(isset($_POST['LoginForm']))
        {
          if($model->load(Yii::$app->request->post()) && $model->login()){
            Yii::$app->session->setFlash("success", "¡Bienvenido!");
            return $this->redirect(['index']);
          }
        }
        if(Yii::$app->user->identity){
          return $this->redirect(['index']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
