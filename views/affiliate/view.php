<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Affiliate */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Filiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="affiliate-view">
  <?php
  $update_delete =
  Html::a('Atras', ['/affiliate'],
  ['class' => 'btn btn-danger', 'style' => 'color:white'])
  .' '.
  Html::a('Actualizar', ['update', 'id' => $model->id],
  ['class' => 'btn btn-primary', 'style' => 'color:white']);
   ?>
<?=
    DetailView::widget([
    'model'=>$model,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
    'panel'=>[
        'heading'=>'Filial # ' . $model->id,
        'type'=>DetailView::TYPE_PRIMARY,
        'footer' => $update_delete
    ],
    'enableEditMode' => false,
    'attributes' => [
        'name',
        'active:boolean',
        'allows_ministry:boolean',
        //['attribute'=>'publish_date', 'type'=>DetailView::INPUT_DATE],
    ],
])
?>
