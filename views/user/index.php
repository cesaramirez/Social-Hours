<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario';
$this->params['breadcrumbs'][] = $this->title;

$this->beginBlock('content-header');
echo $this->title . "<small>Index</small>";
$this->endBlock();
?>

  <div class="user-index">
    <div class="box">
      <div class="box-body">
        <p>
          <?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'filterPosition' => 'header',
          'showFooter' => true,
          'showHeader' => true,
          'tableOptions' => ['class' => 'table table-bordered table-hover dataTable'],
          'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'last_name',
            'username',
            [
              'filter' => ['1' => 'Si','0' => 'No'],
              'format' => 'boolean',
              'attribute' => 'active',
            ],
            // 'password',
            // 'role_id',
            // 'email:email',
            // 'active',
             [
               'filter' => ['1' => 'Si', '0' => 'No'],
               'format' => 'boolean',
               'attribute' =>'reset_password'
             ],

            ['class' => 'yii\grid\ActionColumn',
              'header' => 'Herramientas',
              'headerOptions'=>['style'=>'text-align: center'],
              'contentOptions'=>['style'=>'text-align: center']
            ],
          ],
        ]); ?>
        <?php Pjax::end(); ?>
      </div>
    </div>
</div>
