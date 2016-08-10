<?php

namespace app\controllers;

use Yii;
use app\models\Ministry;
use app\models\search\MinistrySearch;
use app\models\PositionMinistry;
use app\models\search\PositionMinistrySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\AccessFilter;

/**
 * MinistryController implements the CRUD actions for Ministry model.
 */
class MinistryController extends Controller
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
              'overrideSession' => [],
              'overrideSecurity' => []
            ],
        ];
    }

    /**
     * Lists all Ministry models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MinistrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ministry model.
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
     * Creates a new Ministry model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ministry();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash("success", "Ministerio Creado");
            return $this->redirect(['/ministry']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ministry model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash("success", "Ministerio Actualizado");
            return $this->redirect(['/ministry']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ministry model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash("danger", "Ministerio Eliminado");
        return $this->redirect(['index']);
    }

    public function actionPosition($id)
    {

        $searchModel = new PositionMinistrySearch();
        $searchModel->ministry_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = $this->findModel($id);

        return $this->render('/positionministry/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    /**
     * Finds the Ministry model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ministry the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ministry::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
