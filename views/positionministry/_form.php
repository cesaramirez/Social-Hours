<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\typeahead\Typeahead;
/* @var $this yii\web\View */
/* @var $model app\models\PositionMinistry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="position-ministry-form">
    <div class="box">
      <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'ministry_id')->hiddenInput()->label(false) ?>

        <?= Html::label('Cargo', 'for'); ?>
        <?= Typeahead::widget([
              'name' => 'position_name',
              'options' => ['placeholder' => 'Digitar cargo ...','required'=>true],
              'pluginOptions' => ['highlight'=>true],
              'dataset' => [
                  [
                      'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                      'display' => 'name',
                      'displayKey' => 'id',
                      // 'prefetch' => $baseUrl . '/samples/countries.json',
                      'remote' => [
                          'url' => Url::to(['positionministry/get-positions']) . '?q=%QUERY',
                          'wildcard' => '%QUERY',
                      ]
                  ]
              ]
          ])
          ?>
          <?= $form->field($model, 'description')->textarea() ?>

        <?= $form->field($model, 'active')->checkbox(['value' => true]) ?>

      </div>
      <div class="box-footer">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>

</div>
