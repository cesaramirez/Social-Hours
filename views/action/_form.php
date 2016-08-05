<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Action */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="action-form">
    <div class="box">
      <div class="box-body">
        <div class="row">
          <?= $form->field($model, 'name', ['options' => ['class' => 'col-md-6']])->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'friendly_name', ['options' => ['class' => 'col-md-6']])->textInput(['maxlength' => true]) ?>



          <?= $form->field($model, 'description', ['options' => ['class' => 'col-md-12']])->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'controller_id')->hiddenInput()->label(false) ?>


        </div>
      </div>
      <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
    </div>
    <?php $form = ActiveForm::begin(); ?>


    <?php ActiveForm::end(); ?>

</div>
