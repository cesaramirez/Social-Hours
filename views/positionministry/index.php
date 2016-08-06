<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PositionMinistrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cargos de Ministerio: ' . $model->name ;
$this->params['breadcrumbs'][] = $this->title;

$this->beginBlock('content-header');

echo $this->title . "<small>Index</small>";
$this->endBlock();
?>
<div class="position-ministry-index">
  <div class="box">
    <div class="box-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <p><?= Html::a('Crear', ['positionministry/create/' . $model->id], ['class' => 'btn btn-success']) ?></p>

            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'attribute' => 'position_name',
              'value' => 'position.name',
            ],

            [
              'attribute' => 'active',
              'value' => 'active',
              'filter' => ['0' => 'No', '1' => 'Si']
            ],


              ['class' => 'yii\grid\ActionColumn',
              'header' => 'Herramientas',
              'headerOptions'=>['style'=>'text-align: center'],
              'contentOptions'=>['style'=>'text-align: center']],
          ],
      ]); ?>

    </div>
  </div>
</div>
