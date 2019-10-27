<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

?>
<div class="exposiciones-digitalizadas-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
          <!-- // display the image uploaded or show a placeholder
        // you can also use this code below in your `view.php` file -->
        <?php if (!$model->isNewRecord){
                $title = isset($model->archivo) && !empty($model->archivo) ? $model->archivo : 'Avatar';
                echo Html::img($model->getFileUrl(), [
                    'class'=>'pdf', 
                    'alt'=>$title, 
                    'title'=>$title
                ]);
            } ?>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
            <div class="col-sm-2">
                <?= $form->field($model, 'fecha_siniestro')->textInput() ?>
                <?= $form->field($model, 'nro_exposicion')->textInput() ?> 
            </div>

            <div class="col-sm-8">
                <!-- Your fileinput widget for single file upload -->
                <?= $form->field($model, 'fileup')->widget(FileInput::classname(), [
                                'options'=>[
                                    'accept'=>'fileup/*'],
                                'pluginOptions'=>[
                                    'showPreview' => true,
                                    'allowedFileExtensions'=>['pdf','jpg','png']]
                                    ]);?>
            </div>    
    </div>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Upload' : 'Update', [
                'class'=>$model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
                );?>
        </div>
    <?php ActiveForm::end(); ?>
</div>