<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paises';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">
  <div class="box">
    <div class="box-body">
      <p>
          <?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?>
      </p>
      <?php Pjax::begin(['id' => 'country-index', 'timeout' => false,
      'enablePushState' => false]); ?>
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
                'filter' => ['1' => 'Si', '0' => 'No'],
                'attribute' => 'active',
                'format' => 'boolean'
              ],

              ['class' => 'yii\grid\ActionColumn',
              'header' => 'Herramientas',
              'headerOptions' => ['style' => 'text-align: center'],
              'contentOptions' => ['style' => 'text-align: center']
              ],
          ],
      ]); ?>
    </div>
  </div>
</div>
