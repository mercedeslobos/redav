<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Exposiciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exposiciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'policias_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'participa_division')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'siniestros_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
