<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ministry */

$this->title = 'Actualizar Ministerio: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ministerios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ministry-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
