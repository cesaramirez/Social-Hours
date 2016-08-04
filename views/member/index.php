<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">
  <div class="box">
    <div class="box-body">
      <p>
          <?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?>
      </p>
      <?php Pjax::begin(['id' => 'member-index', 'timeout' => false,
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

              'code',
              'name',
              'last_name',
              'document_number',
              [
                'attribute' => 'status',
                'value' => 'status.name_status'
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
