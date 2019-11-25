<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
 

/* @var $this yii\web\View */
/* @var $model app\models\Siniestros */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siniestros-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-sm">
                <?= $form->field($modelSiniestro, 'fecha',[
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-2">{input}{error}</div>' 
                                   ])->widget(DatePicker::className(),[
                                        'dateFormat' => 'yyyy-MM-dd',
                                        'clientOptions' => [
                                            'yearRange' => '-115:+0',
                                            'changeYear' => true],
                                            'options' => ['class' => 'form-control', 'style' => 'width:100%']
                                    ]) ?>
                <?= $form->field($modelSiniestro, 'hora', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-3">{input}{error}</div>' 
                                    ])->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <?= $form->field($modelSiniestro, 'lugar', [
                    'template' => '<div class="col-sm-1">{label}</div>
                                   <div class="col-sm-7">{input}{error}</div>' 
                                    ])->textArea(['rows' => 6]) ?>
            </div>
        </div> 

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
