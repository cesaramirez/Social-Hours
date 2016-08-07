<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Action */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="action-form">
   <?php $form = ActiveForm::begin(); ?>
   <div class="box">
      <div class="box-body">
        <div class="row">
          <?= $form->field($model, 'name', ['options' => ['class' => 'col-md-6']])->textInput(['maxlength' => true,'disabled' => true]) ?>

          <?= $form->field($model, 'friendly_name', ['options' => ['class' => 'col-md-6']])->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'description', ['options' => ['class' => 'col-md-12']])->textArea(['maxlength' => true]) ?>

          <?= $form->field($model, 'controller_id')->hiddenInput()->label(false) ?>

        </div>
      </div>
      <div class="box-footer">
        <?= Html::submitButton( 'Actualizar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Átras',Url::to(['controler/action','id' => $model->controller_id]),['class' => 'btn btn-danger']) ?>
      </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
