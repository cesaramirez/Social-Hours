<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cargos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-index">
  <div class="box">
    <div class="box-body">
    <p>
        <?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['id'=> 'position-index', 'timeout' => false,
    'enablePushState' => false]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterPosition' => 'header',
        'showFooter' => true,
        'showHeader' => true,
        'tableOptions' => ['class' => 'table table-bordered table-success table-hover
        dataTable'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
              'filter' => ['1' => 'Si', '0' => 'No'],
              'format' => 'boolean',
              'attribute' => 'active'
            ],

            ['class' => 'yii\grid\ActionColumn',
             'header' => 'Herramientas',
             'headerOptions' => ['style' => 'text-align: center'],
             'contentOptions' => ['style' => 'text-align: center']
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
    </div>
  </div>
</div>
