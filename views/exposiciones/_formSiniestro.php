<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Siniestros */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siniestros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelSiniestro, 'fecha')->textInput() ?>

    <?= $form->field($modelSiniestro, 'hora')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelSiniestro, 'lugar')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
