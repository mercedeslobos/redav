<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Paises */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paises-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pais')->textInput(['maxlength' => true,'style'=>'width:300px']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
