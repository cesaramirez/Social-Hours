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
        <p><?= Html::a('Crear Role', ['create'], ['class' => 'btn btn-success']) ?></p>
        <?php Pjax::begin(); ?>      
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

                  'id',
            'name',
            'description',
            'active',

              ['class' => 'yii\grid\ActionColumn',
              'header' => 'Herramientas',
              'headerOptions'=>['style'=>'text-align: center'],
              'contentOptions'=>['style'=>'text-align: center']],
          ],
      ]); ?>
        <?php Pjax::end(); ?>    
    </div>
  </div>
</div>
