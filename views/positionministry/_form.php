<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\typeahead\Typeahead;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\PositionMinistry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="position-ministry-form">
    <div class="box">
      <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'ministry_id')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'position_id')->hiddenInput()->label(false) ?>

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

          <label for="position">Cargo</label>
          <?= AutoComplete::widget([
              'name' => 'position_name',
              'clientOptions' => [
                  'source' => new JsExpression("function(request, response) {
                                  $.getJSON('".Url::to(["positionministry/get-positions"])."', {
                                      term: request.term
                                  }, response);
                              }"),
                  'select' => new JsExpression("function( event, ui ){
                                    $('#positionministry-position_id').val(ui.item.id)
                                  }"),
              ]
          ]);
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
