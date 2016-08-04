<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Controller */

$this->title = 'Actualizar Controlador: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Controladores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name];
?>
<div class="controller-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
