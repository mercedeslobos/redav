<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ExposicionesDigitalizadas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exposiciones-digitalizadas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'archivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_siniestro')->textInput() ?>

    <?= $form->field($model, 'nro_exposicion')->textInput() ?>

    <?= FileInput::widget([
    'name' => 'attachment_48[]',
    'options'=>[
        'multiple'=>true
    ],
    'pluginOptions' => [
        'uploadUrl' => Url::to(['/documentos/digitalizadas']),
        'maxFileCount' => 10
    ]
]);?>
  

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
