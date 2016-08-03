<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Role;
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
            <?= $form->field($model, 'username')
                ->textInput(['maxlength' => true,'class' => 'lowercase']) ?>
          </div>

          <?php if(Yii::$app->controller->action->id == 'create'): ?>
          <div class="col-sm-6">
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
          </div>

        </div>
        <div class="row">
        <?php endif ?>

          <div class="col-sm-6">
            <?= $form->field($model, 'role_id')->dropDownList(Role::get("1"),['prompt' => 'Seleccionar Rol'])?>
          </div>
          <div class="col-sm-6">
            <?= $form->field($model, 'email')
                ->textInput(['maxlength' => true,'class' => 'lowercase']) ?>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <?= $form->field($model, 'active')->checkbox() ?>
          </div>
          <div class="col-sm-6">
            <?= $form->field($model, 'reset_password')->checkbox() ?>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord
            ? Yii::t('yii','Crear')
            : Yii::t('yii','Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Átras', ['/user'], ['class' => 'btn btn-danger']); ?>
      </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
