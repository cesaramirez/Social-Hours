<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ministry */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ministerios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ministry-view">
  <?php
  $update_delete =
      Html::a('Actualizar', ['update', 'id' => $model->id],
      ['class' => 'btn btn-primary', 'style' => 'color:white'])
      .' '.
      Html::a('Atras', ['/ministry'],
      ['class' => 'btn btn-danger', 'style' => 'color:white']);
   ?>

  <?=
      DetailView::widget([
      'model'=>$model,
      'condensed'=>true,
      'hover'=>true,
      'mode'=>DetailView::MODE_VIEW,
      'panel'=>[
          'heading'=>'Ministerio # ' . $model->id,
          'type'=>DetailView::TYPE_PRIMARY,
          'footer' => $update_delete
      ],
      'enableEditMode' => false,
      'attributes' => [
          'name',
          'active:boolean',
          //['attribute'=>'publish_date', 'type'=>DetailView::INPUT_DATE],
      ],
  ])
  ?>

</div>
