<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Controller */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="controller-form">
  <div class="box">
    <div class="box-body">
      <div class="row">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name', ['options' => ['class' => 'col-md-6']])->textInput(['disabled' => 'disabled']) ?>

        <?= $form->field($model, 'friendly_name', ['options' => ['class' => 'col-md-6']])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description', ['options' => ['class' => 'col-md-12']])->textArea(['maxlength' => true]) ?>
      </div>
    </div>
    <div class="box-footer">
      <?= Html::submitButton('Actualizar', ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Átras', ['/controler'], ['class' => 'btn btn-danger']); ?>
    </div>
  </div>
    <?php ActiveForm::end(); ?>

</div>
