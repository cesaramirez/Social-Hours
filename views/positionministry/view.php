<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PositionMinistry */

$this->title = $model->position->name;
$this->params['breadcrumbs'][] = ['label' => 'Cargos de Ministerio', 'url' => ['ministry/position/','id'=>$model->ministry_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-ministry-view">
    <?php
        $footer =
            Html::a('Actualizar', ['/positionministry/update', 'id' => $model->id,
                                    'ministry_id' => $model->ministry_id],
            ['class' => 'btn btn-primary', 'style' => 'color:white'])
            .' '.
            Html::a('Atras', ['/ministry/position','id' => $model->ministry_id],
            ['class' => 'btn btn-danger', 'style' => 'color:white']);
   ?>

   <?=
    DetailView::widget([
      'model'=>$model,
      'condensed'=>true,
      'hover'=>true,
      'mode'=>DetailView::MODE_VIEW,
      'panel'=>[
          'heading'=>"Cargo: {$model->position->name}" ,
          'type'=>DetailView::TYPE_PRIMARY,
          'footer' => $footer
      ],
      'enableEditMode' => false,
      'attributes' => [
           [
               'attribute'=>'ministry',
               'value'=>$model->ministry->name,
           ],
           [
               'attribute'=>'position',
               'value'=>$model->position->name,
           ],        
           'description'
      ],
     ]) 
     ?>

</div>
