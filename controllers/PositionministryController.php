<?php

namespace app\controllers;

use Yii;
use yii\db\Query;
use yii\helpers\Json;
use app\models\PositionMinistry;
use app\models\search\PositionMinistrySearch;
use app\models\Ministry;
use app\models\Position;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\AccessFilter;

/**
 * PositionMinistryController implements the CRUD actions for PositionMinistry model.
 */
class PositionministryController extends Controller
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
              'overrideSecurity' => ['GetPositions']
            ],
        ];
    }


    /**
     * Displays a single PositionMinistry model.
     * @param integer $id
     * @param integer $ministry_id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PositionMinistry model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new PositionMinistry();
        $model->ministry_id = $id;
        $ministry = Ministry::findOne($id);

        if(Yii::$app->request->post())
        {
            $post = Yii::$app->request->post('PositionMinistry');
            # Create new position if position_id is empty
            if($post['position_id'])
            {

              # Adding position's description and save
              if($model->load(Yii::$app->request->post()) && $model->save()){
                return $this->redirect(['ministry/position/', 'id' => $id]);
              }
              else
                echo "error1";

            }
            else
            {
                $existPosition = Position::findOne(['name' => trim($post['position_name'])]);
                if(empty($existPosition))
                {
                    $position = new Position();
                    $position->name = $post['position_name'];

                    if($position->save())
                    {
                        if ($model->load(Yii::$app->request->post()))
                        {
                            $model->position_id = $position->id;
                            if($model->save()){
                            return $this->redirect(['ministry/position/', 'id' => $id]);
                            }
                        }
                    }                   
                }
                else
                {
                        if ($model->load(Yii::$app->request->post()))
                        {
                            $model->position_id = $existPosition->id;
                            if($model->save()){
                            return $this->redirect(['ministry/position/', 'id' => $id]);
                            }
                        }
                }
             }
        }
        else
        {
            return $this->render('create', [
                'model' => $model,
                'id' => $id,
                'ministry' => $ministry,
            ]);
        }
    }

    /**
     * Updates an existing PositionMinistry model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $ministry_id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {
            
            $post = Yii::$app->request->post('PositionMinistry');
            $existPosition = Position::findOne(['name' => trim($post['position_name'])]);

            if(empty($existPosition))
            {
                $newPosition = new Position();
                $newPosition->name = $model->position_name;
                $newPosition->save();
                $model->position_id = $newPosition->id;
                if($model->save())
                {
                return $this->redirect(['ministry/position/', 'id' => $model->ministry_id]);
                }
            }
            else
            {
                $model->position_id = $existPosition->id;
                if($model->save())
                {
                return $this->redirect(['ministry/position/', 'id' => $model->ministry_id]);
                }
            }
            
        } 
        else 
        {
            $position = Position::findOne($model->position_id);
            $model->position_name = $position->name;
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PositionMinistry model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $ministry_id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if($model->delete()){
            return $this->redirect(['/ministry/position/', 'id' => $ministry_id]);
        }    
    }

    public function actionGetPositions($term)
    {
      $query = new Query;

      $query->select(['id','name'])
          ->from('position')
          ->where('name LIKE "%' . $term .'%"')
          ->orderBy('name');

      $command = $query->createCommand();
      $data = $command->queryAll();
      $out = [];

      foreach ($data as $d) {
          $out[] = ['value' => $d['name'],
                    'id' => $d['id']
                   ];
      }
        echo Json::encode($out);
    }

    /**
     * Finds the PositionMinistry model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $ministry_id
     * @return PositionMinistry the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PositionMinistry::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
