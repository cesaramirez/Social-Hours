<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Country;
use app\models\Status;
/* @var $this yii\web\View */
/* @var $model app\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">
  <div class="box box-success">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>
      <div class="row">
      <?= $form->field($model, 'code', ['options' =>['class' => 'col-md-2']])
               ->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'name', ['options' =>['class' => 'col-md-5']])
               ->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'last_name', ['options' =>['class' => 'col-md-5']])
               ->textInput(['maxlength' => true]) ?>
      </div>
      <div class="row">
      <?= $form->field($model, 'document_number', ['options' => ['class' => 'col-md-3']])
               ->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'birthdate', ['options' => ['class' => 'col-md-3']])
                ->widget(DatePicker::classname(), [
                                     'name' => 'birthDate',
                                     'value' => date(1),
                                     'options' => ['placeholder' => 'Fecha de Bautizo'],
                                     'pluginOptions' => [
                                         'format' => 'dd-M-yyyy',
                                         'todayHighlight' => true
                                       ]
                                     ]
                         )
      ?>

      <?= $form->field($model, 'country_id', ['options' =>['class' => 'col-md-3']])
               ->dropDownList(Country::get(true),['prompt' => 'Seleccionar Pais']) ?>

      <?= $form->field($model, 'status_id',['options' => ['class' => 'col-md-3']])
               ->dropDownList(Status::get('member'),['prompt' => 'Seleccionar Estado']) ?>
      </div>
      <div class="row">
      <?= $form->field($model, 'email', ['options' =>['class' => 'col-md-3']])
               ->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'baptism_date', ['options' =>['class' => 'col-md-3']])
               ->widget(DatePicker::classname(), [
                                    'name' => 'baptism_date',
                                    'value' => date('d-MM-yyy'),
                                    'options' => ['placeholder' => 'Fecha de Bautizo'],
                                    'pluginOptions' => [
                                        'format' => 'dd-M-yyyy',
                                        'todayHighlight' => true
                                      ]
                                    ]
                        )
      ?>

      <?= $form->field($model, 'address', ['options' =>['class' => 'col-md-6']])
               ->textInput(['maxlength' => true]) ?>
      </div>
      <div class="row"><!-- Doesn't recieve anything from Database due to Relationships -->
      <?= $form->field($model, 'affiliate_id',['options' => ['class' => 'col-md-3']])
               ->dropDownList([], ['prompt' => 'Seleccionar Filial']) ?>

      <?= $form->field($model, 'inscription_date', ['options' =>['class' => 'col-md-3']])
                ->widget(DatePicker::classname(), [
                                     'name' => 'inscription_date',
                                     'value' => date("d-MM-yyyy"),
                                     'options' => ['placeholder' => 'Fecha de Bautizo'],
                                     'pluginOptions' => [
                                         'format' => 'dd-M-yyyy',
                                         'todayHighlight' => true
                                       ]
                                     ]
                         )
      ?>

      <?= $form->field($model, 'created_at', ['options' =>['class' => 'col-md-3']])
                ->widget(DatePicker::classname(), [
                                     'name' => 'created_at',
                                     'value' => date("d-MM-yyyy"),
                                     'options' => ['placeholder' => 'Fecha de Bautizo'],
                                     'pluginOptions' => [
                                         'format' => 'dd-M-yyyy',
                                         'todayHighlight' => true
                                       ]
                                     ]
                         )
      ?>

      <?= $form->field($model, 'updated_at', ['options' =>['class' => 'col-md-3']])
                ->widget(DatePicker::classname(), [
                                     'name' => 'updated_at',
                                     'value' => date("d-MM-yyyy"),
                                     'options' => ['placeholder' => 'Fecha de Bautizo'],
                                     'pluginOptions' => [
                                         'format' => 'dd-M-yyyy',
                                         'todayHighlight' => true
                                       ]
                                     ]
                         )
      ?>
      </div>
      <div class="row">
      <?= $form->field($model, 'active',['options' => ['class' => 'col-md-3']])
               ->checkbox(['checked'=>'checked']) ?>
      </div>
      <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>

      <?php ActiveForm::end(); ?>

    </div>
  </div>
</div>
