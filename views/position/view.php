<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Position */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-view">
    <p>
        <?php
        $footer =  Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary',                                                            'style' => 'color:white'])
         .' '.
            Html::a('Atras', ['/position/'],
            ['class' => 'btn btn-danger', 'style' => 'color:white']);
        ?> 
    </p>

    <?=
        DetailView::widget([
        'model'=>$model,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>'Cargo # ' . $model->id,
            'type'=>DetailView::TYPE_PRIMARY,
            'footer' => $footer
        ],
        'enableEditMode' => false,
        'attributes' => [
            'name'
        ],
    ])
    ?>

</div>
