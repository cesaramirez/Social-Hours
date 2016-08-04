<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Affiliate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="affiliate-form">
  <div class="box">
    <div class="box-body">
      <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'allows_ministry')->checkbox() ?>

      <?= $form->field($model, 'active')->checkbox() ?>

      <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Atrás',['/affiliate'], ['class' => 'btn btn-danger']) ?>
      </div>

      <?php ActiveForm::end(); ?>

    </div>
  </div>
</div>
