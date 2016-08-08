<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PositionMinistry */

$this->title = 'Crear Cargo del Ministerio: ' . $ministry->name;
$this->params['breadcrumbs'][] = ['label' => 'Cargos de Ministerio', 'url' => ['/ministry/position/' . $ministry->id]];
$this->params['breadcrumbs'][] = $ministry->name;
?>
<div class="position-ministry-create">

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id
    ]) ?>

</div>
