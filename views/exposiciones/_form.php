<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Exposiciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exposiciones-form">
        <?php $form = ActiveForm::begin ( [ 
                    'id' => $model->formName () ,
                    'layout' => 'horizontal' ,
                    'class' => 'form-horizontal' ,
                    'fieldConfig' => [
                        'enableError' => true ,
                        'options' => [
                            'class' => ''
                        ]
            ] ] ); ?>
        <div class="row">
            <?= $form->field($model, 'nro',[
                'template' => '<div class="col-sm-1">{label}</div>
                                <div class="col-sm-4">{input}{error}</div>' 
                                ])->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'fecha',[
                'template' => '<div class="col-sm-1">{label}</div>
                                <div class="col-sm-4">{input}{error}</div>' 
                                ])->textInput() ?>
        </div>
        <div class="row">
            <?= $form->field($model, 'policias_id',[
                'template' => '<div class="col-sm-1">{label}</div>
                                <div class="col-sm-4">{input}{error}</div>' 
                                ])->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'participa_division',[
                'template' => '<div class="col-sm-1">{label}</div>
                                <div class="col-sm-4">{input}{error}</div>' 
                                ])->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'siniestros_id',[
                'template' => '<div class="col-sm-1">{label}</div>
                                <div class="col-sm-4">{input}{error}</div>' 
                                ])->textInput(['maxlength' => true]) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
