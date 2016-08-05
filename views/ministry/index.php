<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MinistrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ministerios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ministry-index">
  <div class="box">
    <div class="box-body">
    <p>
        <?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterPosition' => 'header',
        'showFooter' => true,
        'showHeader' => true,
        'tableOptions' => ['class' => 'table table-bordered table-hover
        dataTable'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
              'attribute' => 'active',
              'format' => 'boolean',
              'filter' => ['1' => 'Si', '0' => 'No']
            ],
            ['class' => 'yii\grid\ActionColumn',
            'header' => 'Herramientas',
            'headerOptions' => ['style' => 'text-align: center'],
            'contentOptions' => ['style' => 'text-align: center'],
            'template' => '{position} {view} {update} {delete}',
            'buttons' => [
                'position' => function ($url, $model, $key) {
                                return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, [
                                'title' => 'Cargos',
                              ]);
                              }
            ],
            ],
        ],
    ]);
    ?>
    </div>
  </div>
</div>
