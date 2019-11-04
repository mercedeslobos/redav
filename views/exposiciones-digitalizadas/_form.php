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
                   
                    <?php if(!$model->isNewRecord) {
                            Modal::begin([
                                'headerOptions' => ['<h2>Pdf</h2>'],
                                'toggleButton' => ['label' => 'Ver Archivo Cargado'],
                                'size' => Modal::SIZE_LARGE,
                                
                                ]);
                                echo \lesha724\documentviewer\ViewerJsDocumentViewer::widget([
                                    'url' => Url::base().'/documentos/digitalizadas/'.$model->archivo, 
                                    'width'=>'100%',
                                    'height'=>'350px'
                                    ]);                
                            Modal::end();
                        }?>
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
            <?= Html::submitButton($model->isNewRecord ? 'Cargar' : 'Editar', [
                'class'=>$model->isNewRecord ? 'btn btn-info' : 'btn btn-primary']
                );?>
        </div>
    <?php ActiveForm::end(); ?>
</div>