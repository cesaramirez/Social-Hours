<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\query\UserQuery;
use app\models\search\UserSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Role;
use yii\web\Controller;
use app\components\AccessFilter;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
            [
              'class' => AccessFilter::className(),
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      try {
          $model = new User();

          if($model->load(Yii::$app->request->post())){
            $user = User::findByUsername($model->username);
            if(!empty($user)){
              Yii::$app->session->setFlash("danger", "¡El Usuario ya ha Registrado!");
              return $this->render('create', [
                'model' => $model,
              ]);
          }
          $model->password  = Yii::$app->getSecurity()->generatePasswordHash($model->password);

          if($model->save())
          {
              Yii::$app->session->setFlash("success", "¡El Usuario se creo Exitosamente!");
              return $this->redirect(['index']);
          }
      }
      else {
          $role = new Role();

             return $this->render('create', [
                 'model' => $model
             ]);
         }
      } catch (Exception $e) {
          Yii::$app->session->setFlash("info", $e->message);
          return $this->redirect(['index']);
      } catch (Exception $x) {

      }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $role = new Role();
        $items = ArrayHelper::map($role->find()->all(),'id','name');

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash("success", "¡El Usuario se actualizo Exitosamente!");
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
