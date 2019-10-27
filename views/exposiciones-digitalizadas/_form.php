<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\file\FileInput;
// or 'use kartik\file\FileInput' if you have only installed 
// yii2-widget-fileinput in isolation
?>
<div class="exposiciones-digitalizadas-form">
<?php $form = ActiveForm::begin(); ?>

<!-- <?= $form->field($model, 'archivo')->textInput(['maxlength' => true]) ?> -->
<?= $form->field($model, 'fecha_siniestro')->textInput() ?>
<?= $form->field($model, 'nro_exposicion')->textInput() ?>

<!-- // your fileinput widget for single file upload -->
<?= $form->field($model, 'file')->widget(FileInput::classname(),[
    'options'=>[
        'accept'=>'file/*'
    ],
    'pluginOptions'=>[
        'allowedFileExtensions'=>['pdf','jpg','png'
        ]
]]);?>

<div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Upload' : 'Update', [
    'class'=>$model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
);?>
</div>
<?php ActiveForm::end(); ?>
</div>