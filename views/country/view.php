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
    $update_delete =
    Html::a('Atras', ['/country'],
    ['class' => 'btn btn-success', 'style' => 'color:white'])
    .' '.
    Html::a('Actualizar', ['update', 'id' => $model->id],
    ['class' => 'btn btn-primary', 'style' => 'color:white'])
    .' '.
    Html::a('Delete', ['delete', 'id' => $model->id], [
       'class' => 'btn btn-danger',
       'style' => 'color:white',
       'data' => [
           'confirm' => '¿Seguro que quiere eliminar este pais?',
           'method' => 'post',
       ],
     ]);
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
          'footer' => $update_delete
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
