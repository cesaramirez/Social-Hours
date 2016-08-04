<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ControllerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Controladores';
$this->params['breadcrumbs'][] = $this->title;

$this->beginBlock('content-header');

echo $this->title . "<small>Index</small>";
$this->endBlock();
?>
<div class="controller-index">
  <div class="box">
    <div class="box-body">
        <?php Pjax::begin(['id' => 'controller-index', 'timeout' => false,'enablePushState' => false]);  ?>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'friendly_name',
            'description',
            ['class' => 'yii\grid\ActionColumn',
              'header' => 'Herramientas',
              'template' => '{action} {edit}',
              'headerOptions'=>['style'=>'text-align: center'],
              'contentOptions'=>['style'=>'text-align: center'],
              'buttons'=>[
                'action' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => 'Acciones',
                    ]);
                },
                'edit' => function ($url, $model, $key) {
                    return Html::a('<span class="fa fa-pencil"></span>', $url, [
                            'title' => 'Actualizar',
                    ]);
                },
              ]
            ],
          ],
      ]); ?>
        <?php Pjax::end(); ?>
    </div>
  </div>
</div>
