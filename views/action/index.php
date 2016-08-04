<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ActionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actions';
$this->params['breadcrumbs'][] = $this->title;

$this->beginBlock('content-header');

echo $this->title . "<small>Index</small>";
$this->endBlock();
?>
<div class="action-index">
  <div class="box">
    <div class="box-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <p><?= Html::a('Crear'</p>
        <?php Pjax::begin(['id' => '-index', 'timeout' => false,'enablePushState' => false]); \ ?>      
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

                  'id',
            'name',
            'friendly_name',
            'description',
            'controller_id',

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
