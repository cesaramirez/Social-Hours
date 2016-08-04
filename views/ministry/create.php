<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ministry */

$this->title = 'Crear Ministerio';
$this->params['breadcrumbs'][] = ['label' => 'Ministerios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ministry-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
