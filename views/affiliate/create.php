<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Affiliate */

$this->title = 'Crear Filial';
$this->params['breadcrumbs'][] = ['label' => 'Filiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="affiliate-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
