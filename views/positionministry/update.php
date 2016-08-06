<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PositionMinistry */

$this->title = 'Actualizar Cargo: ' . $model->position->name;
$this->params['breadcrumbs'][] = ['label' => 'Position Ministries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->position->name, 'url' => ['view', 'id' => $model->id, 'ministry_id' => $model->ministry_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="position-ministry-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
