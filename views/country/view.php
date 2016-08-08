<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Paises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">
    <?php
    $footer =
    Html::a('Atras', ['/country'],
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
          'heading'=>'Pais # ' . $model->id,
          'type'=>DetailView::TYPE_PRIMARY,
          'footer' => $footer
      ],
      'enableEditMode' => false,
      'attributes' => [
          'name',
          'active:boolean',
          'ISO',
          //['attribute'=>'publish_date', 'type'=>DetailView::INPUT_DATE],
      ],
  ])
  ?>
</div>
