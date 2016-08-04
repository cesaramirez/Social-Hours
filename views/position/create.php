<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Position */

$this->title = 'Crear Cargo';
$this->params['breadcrumbs'][] = ['label' => 'Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
