<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PositionMinistry */

$this->title = 'Update Position Ministry: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Position Ministries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'ministry_id' => $model->ministry_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="position-ministry-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
