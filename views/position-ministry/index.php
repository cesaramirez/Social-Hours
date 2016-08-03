<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PositionMinistrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Position Ministries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-ministry-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Position Ministry', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ministry_id',
            'position_id',
            'member_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
