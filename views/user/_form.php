<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Role;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

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

          <?= $form->field($model, 'username',['options' => ['class' => 'col-sm-6']])
                ->textInput(['maxlength' => true,'class' => 'lowercase']) ?>

          <?php if(Yii::$app->controller->action->id == 'create'): ?>
          
            <?= $form->field($model, 'password',['options' => ['class' => 'col-sm-6']])
                     ->passwordInput(['maxlength' => true]) ?>
          
          <?php endif ?>

            <?= $form->field($model, 'role_id',['options' => ['class' => 'col-sm-6']])
                     ->dropDownList(Role::get("1"),['prompt' => 'Seleccionar Rol'])?>

            <?= $form->field($model, 'email', ['options' => ['class' => 'col-sm-6']])
                ->textInput(['maxlength' => true,'class' => 'lowercase']) ?>
          <div class="col-sm-12">
            <label for="Miembro">Miembro</label>
            <?= AutoComplete::widget([
                'model' => $model,
                'attribute' => 'member_name',
                'value' => isset($model->member) ? $model->member->name : '',
                'clientOptions' => [
                    'source' => new JsExpression("function(request, response) {
                                    $.getJSON('".Url::to(["member/get"])."', {
                                        term: request.term
                                    }, response);
                                }"),
                    'select' => new JsExpression("function( event, ui ){
                                        $('#user-member_id').val(ui.item.id)
                                    }"),
                ]
            ]);
            ?>
          </div>
            <?= $form->field($model, 'active', ['options' => ['class' => 'col-sm-6']])->checkbox() ?>
          
          <?= $form->field($model, 'reset_password',['options' => ['class' => 'col-sm-6']])->checkbox() ?>
          
          <?= $form->field($model, 'member_id')->hiddenInput()->label(false) ?>
      <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord
            ? 'Crear'
            : 'Actualizar',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Átras', ['/user'], ['class' => 'btn btn-danger']); ?>
      </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
