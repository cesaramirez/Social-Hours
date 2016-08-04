<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;

$this->beginBlock('content-header');

echo $this->title . "<small>Index</small>";
$this->endBlock();
?>
<div class="role-index">
  <div class="box">
    <div class="box-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <p><?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?></p>
        <?php Pjax::begin(['id' => 'role-index', 'timeout' => false,'enablePushState' => false]);  ?>
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'description',
            [
              'attribute' => 'active',
              'value' => function($model, $key, $index, $column) {
                          return $model->active == 0 ? 'No' : 'Si';
                         },
              'contentOptions' => ['style'=>'text-align: center; width: 5%'],
              'filter' => Html::activeDropDownList($searchModel,
                          'active',
                          ['0' => 'No','1' => 'Si'],
                          ['class' => 'form-control' , 'prompt' => ''])
            ],

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{update} {delete}',
             'header' => 'Herramientas',
             'headerOptions' => ['style'=>'text-align: center'],
             'contentOptions' => ['style'=>'text-align: center'],
            ],
          ],
      ]); ?>
        <?php Pjax::end(); ?>
    </div>
  </div>
</div>
