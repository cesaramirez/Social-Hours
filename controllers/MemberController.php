<?php

namespace app\controllers;

use Yii;
use app\models\Member;
use app\models\search\MemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;
use app\components\AccessFilter;

/**
 * MemberController implements the CRUD actions for Member model.
 */
class MemberController extends Controller
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
              'overrideSecurity' => ['Get']
            ],
        ];
    }

    /**
     * Lists all Member models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Member model.
     * @param integer $id
     * @param integer $country_id
     * @return mixed
     */
    public function actionView($id, $country_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $country_id),
        ]);
    }

    /**
     * Creates a new Member model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Member();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'country_id' => $model->country_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Member model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $country_id
     * @return mixed
     */
    public function actionUpdate($id, $country_id)
    {
        $model = $this->findModel($id, $country_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'country_id' => $model->country_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Member model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $country_id
     * @return mixed
     */
    public function actionDelete($id, $country_id)
    {
        $this->findModel($id, $country_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param type var Description
     **/
    public function actionGet($term)
    {
      $query = new Query;

      $query->select(["id","CONCAT(name,' ',last_name) AS full_name"])
          ->from('member')
          ->where('CONCAT(name,\' \',last_name) LIKE "%' . $term .'%"')
          ->orderBy('name');

      $command = $query->createCommand();
      $data = $command->queryAll();
      $out = [];

      foreach ($data as $d) {
          $out[] = ['value' => $d['full_name'],
                    'id' => $d['id']
                   ];
      }
        echo Json::encode($out);
    }

    /**
     * Finds the Member model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $country_id
     * @return Member the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $country_id)
    {
        if (($model = Member::findOne(['id' => $id, 'country_id' => $country_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
