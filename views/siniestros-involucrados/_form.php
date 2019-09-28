<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SiniestrosInvolucrados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siniestros-involucrados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'siniestros_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'involucrados_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehiculos_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
