<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;

?>
<div class="exposiciones-digitalizadas-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-sm-1"></div>
            <div class="col-sm-2">
                <?= $form->field($model, 'fecha_siniestro')->textInput() ?>
                <?= $form->field($model, 'nro_exposicion')->textInput() ?> 
                <?php Modal::begin([
                    'headerOptions' => ['<h2>Hello world</h2>'],
                    'toggleButton' => ['label' => 'Ver Archivo Cargado'],
                ])?>

                <?php echo Url::base().'/documentos/digitalizadas/ok-constancia-27294491452-2019-10-19(1).pdf';
                echo \yii2assets\pdfjs\pdfjs::widget([
                'url' =>Url::base(). '/documentos/digitalizadas/ok-constancia-27294491452-2019-10-19(1).pdf'
                ]);?>

               <?php Modal::end();?>
            </div>
           
   


            <div class="col-sm-8">
                <!-- Your fileinput widget for single file upload -->
                <?= $form->field($model, 'fileup')->widget(FileInput::classname(), [
                                'options'=>[
                                    'accept'=>'fileup/*',
                                   ],
                                'pluginOptions'=>[
                                   
                                    'overwriteInitial' => false,
                                   
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