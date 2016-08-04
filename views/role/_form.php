<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Role */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-form">
  <div class="box">
    <!-- <div class="box-header">
      <h2><?= Html::encode($this->title) ?></h2>
    </div> -->
    <div class="box-body">
      <div class="row">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model,
                         'name',
                         ['options' => ['class' => 'col-sm-12']])
                         ->textInput(['maxlength' => true,
                                      'class' => 'capitalize form-control',
                                      'disabled' => Yii::$app->controller->action->id == 'update' ? true : false]) ?>

        <?= $form->field($model, 'description', ['options' => ['class' => 'col-sm-12']])->textArea(['maxlength' => true]) ?>

        <?= $form->field($model, 'active', ['options' => ['class' => 'col-sm-12']])->checkbox() ?>

      </div>
     </div>
      <div class="box-footer">
          <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          <?= Html::a('Átras', ['/role'], ['class' => 'btn btn-danger']); ?>
      </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>
