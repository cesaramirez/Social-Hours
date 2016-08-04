<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box box-success">
      <div class="box-body">

          <?= $form->field($model, 'name')
                   ->textInput(['maxlength' => true]) ?>
          <?= $form->field($model, 'ISO')
                    ->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'active')
                   ->checkbox() ?>
         <div class="form-group">
             <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
             <?= Html::a('Atrás', ['/country'], ['class' => 'btn btn-danger']) ?>
         </div>

         <?php ActiveForm::end(); ?>
      </div>

    </div>
</div>
