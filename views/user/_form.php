<?php

use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
$this->beginBlock('content-header');
echo $this->title . "<small>" . Yii::t('yii',Yii::$app->controller->action->id) . "</small>";
$this->endBlock();
?>

<div class="user-form">
    <div class="box">
      <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
          <div class="col-sm-12 text-center">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
          </div>
          <div class="col-sm-6">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
          </div>
          <div class="col-sm-6">
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <?= $form->field($model, 'role_id')->textInput() ?>
          </div>
          <div class="col-sm-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <?= $form->field($model, 'active')->textInput() ?>
          </div>
          <div class="col-sm-6">
            <?= $form->field($model, 'reset_password')->textInput() ?>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord
            ? Yii::t('yii','Crear')
            : Yii::t('yii','Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
