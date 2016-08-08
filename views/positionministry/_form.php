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
          <?= AutoComplete::widget([
              'model' => $model,
              'attribute' => 'position_name',
              'options' => ['required' => '','class' => 'capitalize form-control'],
              'clientOptions' => [
                  'source' => new JsExpression("function(request, response) {
                                  $.getJSON('".Url::to(["positionministry/get-positions"])."', {
                                      term: request.term
                                  }, response);
                              }"),
                  'select' => new JsExpression("function( event, ui ){
                                    $('#positionministry-position_id').val(ui.item.id)
                                  }"),

                //   'open' => new JsExpression("function( event, ui ){
                //                     $('#positionministry-position_name').on('blur',function(){
                //                         var id = $('#positionministry-position_id').val();
                //                         console.log($('#positionministry-position_id').val());                                        
                //                         console.log(id)
                //                         if(id == ''){
                //                             $('#positionministry-position_name').val('')
                //                         }
                //                     });
                //                   }"),
              ]
          ]);
          ?>
          <?= $form->field($model, 'description')->textarea() ?>

        <?= $form->field($model, 'active')->checkbox(['value' => true]) ?>

      </div>
      <div class="box-footer">
            <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a('Atras', ['/ministry/position','id' => $model->ministry_id],
            ['class' => 'btn btn-danger', 'style' => 'color:white']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
</div>
<script>
    $(function(){                   
        $('#positionministry-position_name').on('focus',function(){
            $('#positionministry-position_name').on('keyup',function(e){
                if(e.keyCode != 32){
                    $('#positionministry-position_id').val('');    
                }    
            })
        }); 
    });  
</script>
