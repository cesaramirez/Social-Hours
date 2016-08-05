<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ActionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acciones de Controlador: ' . ucfirst($model->name);
$this->params['breadcrumbs'][] = $this->title;

$this->beginBlock('content-header');
echo $this->title . "<small>Index</small>";
$this->endBlock();
?>
<div class="action-index">
  <div class="box">
    <div class="box-body">
        <?php Pjax::begin(['id' => '-index', 'timeout' => false,'enablePushState' => false]); ?>
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'friendly_name',
            'description',

              ['class' => 'yii\grid\ActionColumn',
              'template' => '{update}',
              'header' => 'Herramientas',
              'headerOptions'=>['style'=>'text-align: center'],
              'contentOptions'=>['style'=>'text-align: center']],
          ],
      ]); ?>
        <?php Pjax::end(); ?>
    </div>
  </div>
</div>
