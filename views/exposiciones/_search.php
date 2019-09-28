<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ExposicionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exposiciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nro') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'policias_id') ?>

    <?= $form->field($model, 'participa_division') ?>

    <?php // echo $form->field($model, 'siniestros_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
