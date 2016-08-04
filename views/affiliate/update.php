<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Affiliate */

$this->title = 'Actualizar Filial: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Filiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="affiliate-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
