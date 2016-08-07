<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Action */

$this->title = 'Actualizar Acción: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => "Acciones de Controlador {$model->controller->name}", 
                                  'url' => ['controler/action','id' => $model->controller_id]];
$this->params['breadcrumbs'][] = ['label' => $model->name];

?>
<div class="action-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
